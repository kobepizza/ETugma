<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class HeadAdminNotificationController extends Controller
{
    public function index()
    {
        return view('head_admin.headadminnotif');
    }

    public function loadNotifs()
    {
        $loggedUserID = session('loginId');

        $notifs = Notification::where(function ($query) use ($loggedUserID) {
            $query->where('user_id', $loggedUserID)
                ->where('user_type', 4)
                ->where('notification_type', 1);
        })->orWhere(function ($query) {
            $query->where('user_type', 4)
                ->where('notification_type', 3);
        })->orderBy('created_at', 'desc')
            ->get();


        if ($notifs) {
            return response()->json($notifs);
        } else {
            return response()->json(['message' => 'No new notifications found']);
        }
    }

    public function countNotifs()
    {
        $LoggedUserId = session('loginId');

        $notifCount = Notification::where('user_type', 4)
            ->where(function ($query) use ($LoggedUserId) {
                $query->where('user_id', $LoggedUserId)
                    ->where('notification_type', 1)
                    ->where('seen', 0);
            })
            ->count();

        //dd($notifCount);
        return response()->json($notifCount);
    }

    public function getNotifDetails(Request $request)
    {
        $notifId = $request->input('notif_id');
        $notifType = $request->input('notif_type');

        $notif = Notification::where('id', $notifId)
            ->where('notification_type', $notifType)
            ->first();

        if ($notif) {

            if ($notif->seen != 1) {
                $notif->seen = 1;
                $notif->save();
            }

            $type = $notif->notification_type;
            $bookingID = $notif->booking_id;
            $sessionID = $notif->tutoring_session_id;

            if ($notifType == 1) { //notification 

                if ($type == 1 && $bookingID > 0 && $sessionID <= 0) { // if notification is about booking / session
                    $response = [
                        'type' => $notif->notification_type,
                        'booking_id' => $bookingID,
                        'author'=> $notif->author,
                        'title' => $notif->title,
                        'content' => $notif->content,
                        'created_at' => $notif->created_at
                    ];
                    return response()->json($response);
                } elseif ($type == 1 && $bookingID <= 0 && $sessionID > 0) { // if notification is about tutoring session
                    $response = [
                        'type' => $notif->notification_type,
                        'booking_id' => $bookingID,
                        'author'=> $notif->author,
                        'title' => $notif->title,
                        'content' => $notif->content,
                        'created_at' => $notif->created_at
                    ];
                    return response()->json($response);
                } else { //if system notification
                    $response = [
                        'type' => $notif->notification_type,
                        'booking_id' => $bookingID,
                        'author'=> $notif->author,
                        'title' => $notif->title,
                        'content' => $notif->content,
                        'created_at' => $notif->created_at
                    ];
                    return response()->json($response);
                }
            } elseif ($notifType == 3 && $bookingID <= 0 && $sessionID <= 0) { //announcement
                $response = [
                    'type' => $notif->notification_type,
                    'booking_id' => $bookingID,
                    'title' => $notif->title,
                    'content' => $notif->content,
                    'created_at' => $notif->created_at
                ];
                return response()->json($response);
            }
        } else {
            return response()->json(['message' => 'error fetching detials']);
        }
    }

    public function deleteNotif(Request $request)
    {
        $notifID = $request->input('notifID');
        $notif = Notification::find($notifID);

        if ($notif) {
            $notif->delete();

            return response()->json(['message' => 'Notification deleted successfully']);
        } else {
            return response()->json(['message' => 'error deleting notification']);
        }
    }
}
