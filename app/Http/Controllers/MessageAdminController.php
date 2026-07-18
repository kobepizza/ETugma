<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Notification;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class MessageAdminController extends Controller
{
    public function index()
    {
        return view('utilities.messageadmin');
    }

    public function sendMessage(Request $request)
    {
        $loggedUserID = session('loginId');

        $user = UserProfile::find($loggedUserID);
        //dd($user);
        $username = "$user->fname $user->lname";
        $userType = $user->userType->id;

        $receiver = UserProfile::where('user_type_id', 4)->first();
        $receiverId = $receiver->id;

        $title = $request->input('title');
        $message = $request->input('message');

        if (empty($receiver)) {
            return redirect()->back()->with('error', 'Admin not found.');
        }
        
        if (empty($title)) {
            return redirect()->back()->with('error', 'Subject is required.');
        }
        
        if (empty($message)) {
            return redirect()->back()->with('error', 'Message is required.');
        }

        $userTypeArray = [
            1 => 'Parent',
            2 => 'Tutor',
        ];

        if ($loggedUserID) {

            //create new notification
            $Notif = new Notification();
            $Notif->user_id = $receiverId; //receiver
            $Notif->title = "A {$userTypeArray[$userType]} sent you a message";
            $Notif->author = $username; //sender
            $Notif->content = "<span class='fw-bold'>Subject: </span> <br><br> $title <br><br> <span class='fw-bold'>Message: </span> <br><br>$message";
            $Notif->notification_type = 1; //1 for notif 2 for message 3 for announcement
            $Notif->user_type = 4;
            $Notif->seen = 0;
            $Notif->booking_id = 0;
            $Notif->tutoring_session_id = 0;
            $Notif->created_at = now()->setTimezone(config('app.timezone'));
            $Notif->save();
        }
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

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
