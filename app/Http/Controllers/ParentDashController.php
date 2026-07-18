<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\GuardianMain;
use App\Models\Notification;
use App\Models\Subject;
use App\Models\TutorSession;
use App\Models\UserProfile;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class ParentDashController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::get()->all();
        $yearLevel = YearLevel::get()->all();

        $loggedUserID = session('loginId');
        $userProfile = UserProfile::find($loggedUserID);
        
        $profilePic = null;

        if ($userProfile && strlen($userProfile->profile_pic) <= 2) {
            $profilePic = 1;
        } else {
            $profilePic = 0;
        }

         return view('parent.parentdash', compact('subjects', 'yearLevel', 'profilePic'));
    }
    
    public function checkFinishedSessions()
    {
        $guardianID = session('clientMain')->guardian->id;
        $guardianMainID = GuardianMain::where('guardian_id', $guardianID)->pluck('id');
    
        $tutorSessions = TutorSession::with('sessionStatus')
            ->whereIn('guardian_main_id', $guardianMainID)
            ->where('session_status_id', 2) // Check for status 2 (ended sessions)
            ->get();

        $session = $tutorSessions->pluck('id');
        
        if ($tutorSessions) {
            $loggedUserID = session('loginId');
            $user = UserProfile::find($loggedUserID);
            $userId = $user->id;
            $username = "$user->fname $user->lname";
        
            foreach ($session as $sessionId) {
                $sessionStatus = TutorSession::where('session_status_id', 2)->where('id', $sessionId)->first();
                $existingNotification = Notification::where('tutoring_session_id', $sessionId)
                    ->where('title', 'Your tutoring session has ended')
                    ->first();

                if ($sessionStatus && !$existingNotification) {
                    //create new notification
                    $Notif = new Notification();
                    $Notif->user_id = $userId; //receiver
                    $Notif->title = "Your tutoring session has ended";
                    $Notif->author = $username; //sender
                    $Notif->content = "";
                    $Notif->notification_type = 1; //1 for notif 2 for message 3 for announcement
                    $Notif->user_type = 1;
                    $Notif->seen = 0;
                    $Notif->booking_id = 0;
                    $Notif->tutoring_session_id = $sessionId;
                    $Notif->created_at = now()->setTimezone(config('app.timezone'));
                    $Notif->save();

                    //send notification
                    event(new UserNotification([
                        'user_id' => $userId,
                        'user_type' => '',
                        'author' => $Notif->author,
                        'title' => $Notif->title,
                        'content' => $Notif->content,
                        'time' => $Notif->created_at,
                        'type' => $Notif->notification_type
                    ]));
                }
            }
            return response()->json('Found finished sessions');
        } 
        return response()->json('No finished sessions');
    }

    public function loadChildren()
    {
        $guardianID = session('clientMain')->guardian->id;

        $child = GuardianMain::with([
            'child.gender',
            'child.yearLevel',
        ])
            ->where('guardian_id', $guardianID)
            ->get();

        return response()->json($child);
    }

    public function loadTutorSessions(Request $request)
    {
        $guardianID = session('clientMain')->guardian->id;
        $childID = $request->input('childID');

        $guardianMainID = GuardianMain::where('guardian_id', $guardianID)->pluck('id');

        $tutorSessions = TutorSession::with(
            'sessionStatus',
            'bookingAvailability.sessionType',
            'bookingAvailability.availabilityStart',
            'bookingAvailability.availabilityEnd',
            'bookingAvailability.day',
            'tutorMain.departmentYearSubject.subject',
            'tutorMain.departmentYearSubject.gradeLevel',
            'tutorMain.preferenceLanguage.preference.modality',
            'tutorMain.tutor.userProfile',
            'guardianMain.child',
            'guardianMain.guardian.userProfile'
        )
            ->whereIn('guardian_main_id', $guardianMainID)
            ->whereHas('guardianMain.child', function ($q) use ($childID) {
                $q->where('id', $childID);
            })
            ->orderBy('created_at', 'ASC')
            ->get();

        $response = [];
        foreach ($tutorSessions as $tutorSession) {
            $response[] = [
                'id' => $tutorSession->id,
                'subject' => $tutorSession->tutorMain->departmentYearSubject->subject,
                'year_level' => $tutorSession->tutorMain->departmentYearSubject->gradeLevel,
                'modality' => $tutorSession->tutorMain->preferenceLanguage->preference->first()->modality->modality,
                'tutor' => $tutorSession->tutorMain->tutor->userProfile,
                'student' => $tutorSession->guardianMain->child,
                'guardian' => $tutorSession->guardianMain->guardian->userProfile,
                'session_type' => $tutorSession->bookingAvailability->sessionType->type,
                'session_start' => $tutorSession->session_start,
                'session_end' => $tutorSession->session_end,
                'day' => $tutorSession->bookingAvailability->day->day,
                'start_time' => $tutorSession->bookingAvailability->availabilityStart->availability,
                'end_time' => $tutorSession->bookingAvailability->availabilityEnd->availability,
                'status' => $tutorSession->sessionStatus,
                'terminate' => $tutorSession->terminate
            ];
        }

         $session = $tutorSessions->pluck('id');

        if ($tutorSessions) {
            $loggedUserID = session('loginId');
            $user = UserProfile::find($loggedUserID);
            $userId = $user->id;
            $username = "$user->fname $user->lname";


            foreach ($session as $sessionId) {
                $sessionStatus = TutorSession::where('session_status_id', 2)->where('id', $sessionId)->first();
                $existingNotification = Notification::where('tutoring_session_id', $sessionId)
                    ->where('title', 'Your tutoring session has ended')
                    ->first();

                if ($sessionStatus && !$existingNotification) {
                    //create new notification
                    $Notif = new Notification();
                    $Notif->user_id = $userId; //receiver
                    $Notif->title = "Your tutoring session has ended";
                    $Notif->author = $username; //sender
                    $Notif->content = "";
                    $Notif->notification_type = 1; //1 for notif 2 for message 3 for announcement
                    $Notif->user_type = 1;
                    $Notif->seen = 0;
                    $Notif->booking_id = 0;
                    $Notif->tutoring_session_id = $sessionId;
                    $Notif->created_at = now()->setTimezone(config('app.timezone'));
                    $Notif->save();

                    //send notification
                    event(new UserNotification([
                        'user_id' => $userId,
                        'user_type' => '',
                        'author' => $Notif->author,
                        'title' => $Notif->title,
                        'content' => $Notif->content,
                        'time' => $Notif->created_at,
                        'type' => $Notif->notification_type
                    ]));
                }
            }
            return response()->json($response);
        } else {
            return response()->json(['error' => 'Error Fetching Sessions']);
        }
       
    }

    public function requestTerminate(Request $request)
    {
        $loggedUserID = session('loginId');
        $sessionID = $request->input('session_id');
        $receiverId = $request->input('tutor_id');
        $senderId = $request->input('parent_id');
        $message = $request->input('reason');

        //dd($message);


        $tutorSession = TutorSession::where('id', $sessionID)->first();
        $user = UserProfile::find($loggedUserID);
        $username = "$user->fname $user->lname";

        if ($tutorSession->terminate == 0) {
            $tutorSession->terminate = 1;
            $tutorSession->save();
        }

        if ($loggedUserID == $senderId) {

            //create new notification
            $Notif = new Notification();
            $Notif->user_id = $receiverId; //receiver
            $Notif->title = "A parent requested to terminate a tutoring session";
            $Notif->author = $username; //sender
            $Notif->content = $message;
            $Notif->notification_type = 1; //1 for notif 2 for message 3 for announcement
            $Notif->user_type = 2;
            $Notif->seen = 0;
            $Notif->booking_id = 0;
            $Notif->tutoring_session_id = $sessionID;
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

        return response()->json(['success' => true, 'message' => 'Termination request sent successfully']);
    }
}
