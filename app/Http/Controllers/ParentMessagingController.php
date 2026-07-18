<?php

namespace App\Http\Controllers;

use App\Events\SendParentMessage;
use App\Events\UserNotification;
use App\Models\Chat;
use App\Models\Guardian;
use App\Models\GuardianMain;
use App\Models\Notification;
use App\Models\Tutor;
use App\Models\TutorSession;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Session;

class ParentMessagingController extends Controller
{


    public function index()
    {
        return view('parent.parentmessage');
    }

    public function loadContacts()
    {
        $ClientMainId = Session('clientMain')->guardian->id;
        $LoggedUserId = session('loginId');

        $guardianIds = GuardianMain::where('guardian_id', $ClientMainId)->get()->pluck('id');

        $tutorIds = TutorSession::with('tutorMain')
            ->whereIn('guardian_main_id', $guardianIds)
            ->where('session_status_id', 1)
            ->get()
            ->pluck('tutorMain.tutor_id')
            ->unique();

        $receivers = Tutor::with('userProfile')->whereIn('id', $tutorIds)->get()->pluck('userProfile.id');
        //dd($receivers);
        $tutor = UserProfile::whereIn('id',  $receivers)
            ->with(['userSender' => function ($query) use ($LoggedUserId) {
                $query->where(function ($q) use ($LoggedUserId) {
                    $q->where('receiver_id', $LoggedUserId);
                })->latest()->take(1); // Add this to get the latest chat
            }])->select('id', 'fname', 'lname', 'profile_pic')
            ->get();
        //dd($tutor);
        return response()->json($tutor);
    }
    public function countMessage()
    {
        $LoggedUserId = session('loginId');

        // Get active tutor sessions where the guardian's user_profile_id matches the logged-in user
        $activeTutorSessions = TutorSession::with('guardianMain.guardian', 'tutorMain.tutor')
            ->where('session_status_id', 1) // Assuming '1' is for active session status
            ->whereHas('guardianMain.guardian', function ($query) use ($LoggedUserId) {
                $query->where('user_profile_id', $LoggedUserId);
            })
            ->get();

        // Pluck user_profile_ids of tutors, ensuring tutorMain and tutor exist
        $tutorIds = $activeTutorSessions->map(function ($session) {
            return optional($session->tutorMain->tutor)->user_profile_id; // Safe null handling
        })->filter()->all(); // Filter out null values

        // Count chats where the sender is the tutor and the receiver is the logged-in user
        $chatCount = Chat::whereIn('sender_id', $tutorIds)
            ->where('receiver_id', $LoggedUserId)
            ->where('seen', 0)
            ->count();

        return response()->json($chatCount);
    }
    public function searchContacts(Request $request)
    {
        $searchQuery = $request->input('query');

        $ClientMainId = Session('clientMain')->id;
        $LoggedUserId = session('loginId');

        $tutorIds = TutorSession::with('tutorMain')->where('guardian_main_id', $ClientMainId)->get()->pluck('tutorMain.tutor_id');
        $receivers = Tutor::with('userProfile')->whereIn('id', $tutorIds)->get()->pluck('userProfile.id');

        $tutor = UserProfile::whereIn('id',  $receivers)
            ->with(['userSender' => function ($query) use ($LoggedUserId) {
                $query->where(function ($q) use ($LoggedUserId) {
                    $q->where('receiver_id', $LoggedUserId);
                })->latest()->take(1); // Add this to get the latest chat
            }])->select('id', 'fname', 'lname', 'profile_pic')
            ->where(function ($query) use ($searchQuery) {
                $query->where('fname', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('lname', 'LIKE', "%{$searchQuery}%")
                    ->orWhere(UserProfile::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$searchQuery}%");
            })
            ->get();

        return response()->json($tutor);
    }
    public function fetchMessagesFromTutor(Request $request)
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

    public function sendMessageToTutor(Request $request)
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
            $Notif->user_id = $receiverId; //receiver
            $Notif->title = "New message from $username";
            $Notif->author = $username; //sender
            $Notif->content = "";
            $Notif->notification_type = 2; //1 for notif 2 for message 3 for announcement
            $Notif->user_type = 2;
            $Notif->seen = 0;
            $Notif->booking_id = 0;
            $Notif->tutoring_session_id = 0;
            $Notif->created_at = now()->setTimezone(config('app.timezone'));
            $Notif->save();
        }

        // Broadcast the message
        Broadcast(new SendParentMessage($chat, $receiverId, $senderId))->toOthers();

        //send notification
        event(new UserNotification([
            'user_id' => $receiverId,
            'user_type' => '',
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
