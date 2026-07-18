<?php

namespace App\Http\Controllers;

use App\Events\SendAdminMessage;
use App\Events\UserNotification;
use App\Models\Chat;
use App\Models\Notification;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMessagingController extends Controller
{
    public function index()
    {
        return view('admin.adminmessage');
    }

    public function loadContacts()
    {
        $LoggedUserId = session('loginId');

        //dd(session::all());
        $adminIds = UserProfile::where('id', '!=', $LoggedUserId)->get()->pluck('id');

        $admins = UserProfile::whereIn('id', $adminIds)
            ->where(function ($query) {
                $query->where('user_type_id', 3)
                    ->orWhere('user_type_id', 4);
            })
            ->get()
            ->pluck('id');

        /*$guardianIds = TutorSession::with('guardianMain')
            ->whereIn('tutor_main_id', $tutorIds)
            ->where('session_status_id', 1)
            ->get()
            ->pluck('guardianMain.guardian_id')
            ->unique();*/

        //dd($guardianIds);

        //$receivers = Guardian::with('userProfile')->whereIn('id', $guardianIds)->get()->pluck('userProfile.id');
        //dd($receivers);
        /*$contacts = UserProfile::whereIn('id',  $admins)
            ->with(['userSender' => function ($query) use ($admins, $LoggedUserId) {
                $query->where(function ($q) use ($admins, $LoggedUserId) {
                    $q->whereIn('sender_id', $admins)
                        ->Where('receiver_id', $LoggedUserId);
                })->latest()->take(1); // Add this to get the latest chat
            }])->select('id', 'fname', 'lname', 'profile_pic', 'user_type_id')
            ->get();*/

        $contacts = UserProfile::whereIn('id', $admins)
            ->with(['userSender' => function ($query) use ($LoggedUserId) {
                // Get only the messages where the logged user is the receiver and the admin is the sender
                $query->where('receiver_id', $LoggedUserId) // Only messages sent to the logged-in user
                    ->latest() // Get the latest message
                    ->take(1); // Take the most recent message
            }])
            ->select('id', 'fname', 'lname', 'profile_pic', 'user_type_id')
            ->get();

        //return $parent;
        return response()->json($contacts);
    }
    public function countMessage()
    {
        $LoggedUserId = session('loginId');

        $chatCount = Chat::where('receiver_id', $LoggedUserId)
            ->where('seen', 0)
            ->count();

        //dd($chatCount);
        return response()->json($chatCount);
    }
    public function searchContacts(Request $request)
    {
        $searchQuery = $request->input('query');

        //$TutorMainId = Session('tutorMain')->id;
        $LoggedUserId = session('loginId');

        //$ParentIds = TutorSession::with('guardianMain')->where('tutor_main_id', $TutorMainId)->get()->pluck('guardianMain.guardian_id');
        //$receivers = Guardian::with('userProfile')->whereIn('id', $ParentIds)->get()->pluck('userProfile.id');

        $adminids = UserProfile::where('id', '!=', $LoggedUserId)
            ->where(function ($query) {
                $query->where('user_type_id', 3)
                    ->orWhere('user_type_id', 4);
            })
            ->get()
            ->pluck('id');

        $admin = UserProfile::whereIn('id',  $adminids)
            ->with(['userSender' => function ($query) use ($LoggedUserId) {
                $query->where('receiver_id', $LoggedUserId)
                    ->latest()
                    ->take(1); // Add this to get the latest chat
            }])->select('id', 'fname', 'lname', 'profile_pic', 'user_type_id')

            ->where(function ($query) use ($searchQuery) {
                $query->where('fname', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('lname', 'LIKE', "%{$searchQuery}%")
                    ->orWhere(UserProfile::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$searchQuery}%");
            })
            ->get();

        return response()->json($admin);
    }
    public function fetchMessagesFromAdmins(Request $request)
    {
        $senderId = Session('loginId');
        $receiverId = $request->input('receiverId');

        $chat = Chat::where('sender_id', $receiverId)
            ->where('receiver_id', $senderId)
            ->get();

        foreach ($chat as $chats) {
            if ($chats->seen !== 1) {
                $chats->seen = 1;
                $chats->save();
            }
        }

        $messages = Chat::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $senderId);
        })->orderBy('created_at', 'asc')->get();


        return response()->json(['messages' => $messages]);
    }

    public function sendMessageToAdmins(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|exists:user_profiles,id',
            'sender_id' => 'required|exists:user_profiles,id'
        ]);

        $LoggedUserInfo = session('loginId');
        $receiverId = $request->input('receiver_id');
        $senderId = $request->input('sender_id');
        $message = $request->input('message');
        $user = UserProfile::find($LoggedUserInfo);
        $username = "$user->fname $user->lname";

        $adminReceiver = UserProfile::find($receiverId);
        $adminType = $adminReceiver->user_type_id;

        if ($LoggedUserInfo == $senderId) {
            //create chat
            $chat = new Chat();
            $chat->sender_id = $senderId;
            $chat->receiver_id = $receiverId;
            $chat->message = $message;
            $chat->seen = 0;
            $chat->created_at = now()->setTimezone(config('app.timezone'));
            $chat->save();
            //create notification
            $Notif = new Notification();
            $Notif->user_id = $receiverId;
            $Notif->title = "New message from $username";
            $Notif->author = $username;
            $Notif->content = "";
            $Notif->notification_type = 2;
            $Notif->user_type = $adminType;
            $Notif->seen = 0;
            $Notif->booking_id = 0;
            $Notif->tutoring_session_id = 0;
            $Notif->created_at = now()->setTimezone(config('app.timezone'));
            $Notif->save();
        }

        // Broadcast the message
        Broadcast(new SendAdminMessage($chat, $receiverId, $senderId, $adminType))->toOthers();

        //send notification
        event(new UserNotification([
            'user_id' => $receiverId,
            'user_type'=>'',
            'author' => $Notif->author,
            'title' => $Notif->title,
            'content' => $Notif->content,
            'time' => $Notif->created_at,
            'type' => $Notif->notification_type
        ]));

        // Return a JSON response indicating success
        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
}
