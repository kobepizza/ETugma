<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\Subject;
use App\Models\TutorMain;
use App\Models\TutorSession;
use App\Models\UserProfile;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TutorDashController extends Controller
{
    public function index()
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


        return view('tutor.tutordash', compact('subjects', 'yearLevel', 'profilePic'));
    }

    public function loadTutorSessions()
    {
        $tutorID = session('tutorMain')->tutor->id;

        $tutorMainID = TutorMain::where('tutor_id', $tutorID)->pluck('id');

        //dd(session()->all());
        $tutorSessions = TutorSession::with(
            'sessionStatus',
            'bookingAvailability.sessionType',
            'bookingAvailability.availabilityStart',
            'bookingAvailability.availabilityEnd',
            'bookingAvailability.day',
            'bookingAvailability.sessionType',
            'tutorMain.departmentYearSubject.subject',
            'tutorMain.departmentYearSubject.gradeLevel',
            'tutorMain.preferenceLanguage.preference.modality',
            'tutorMain.tutor.userProfile',
            'guardianMain.child',
            'guardianMain.guardian.userProfile'
        )
            ->whereIn('tutor_main_id', $tutorMainID)
            ->orderBy('created_at', 'ASC')->get();

        //dd($tutorSessions);
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

        //dd($tutorSessions);
        if ($tutorSessions) {
            return response()->json($response);
        } else {
            return response()->json(['error' => 'Error Fetching Sessions']);
        }
    }

    public function loadFeedbacks()
    {
        $tutorMainID = session('tutorMain')->id;

        if (!$tutorMainID) {
            return response()->json(['error' => 'Tutor does not exist.']);
        }

        $tutorSessions = TutorSession::where('tutor_main_id', $tutorMainID)->pluck('id');

        $feedbacks = Feedback::with(
            'rating',
            'tutorSession.guardianMain.guardian.userProfile',
            'tutorSession.guardianMain.child',
        )
            ->whereIn('tutor_sessions_id', $tutorSessions)
            ->orderBy('created_at', 'DESC')
            ->get();

        //dd($feedbacks);

        return response()->json($feedbacks);
    }

    public function countSessions()
    {
        $tutorID = session('tutorMain')->tutor->id;

        $tutorMainID = TutorMain::where('tutor_id', $tutorID)->pluck('id');

        $today = Carbon::now()->setTimezone(config('app.timezone'))->toDateString();
        $todayDayOfWeek = Carbon::now()->setTimezone(config('app.timezone'))->dayOfWeek; // 0 (Sunday) to 6 (Saturday)

        $sessionsToday = TutorSession::whereIn('tutor_main_id', $tutorMainID)
            ->where('session_status_id', 1)
            ->where('session_start', '<=', $today)
            ->where('session_end', '>=', $today)
            ->when($todayDayOfWeek === 0 || $todayDayOfWeek === 6, function ($query) {
                // Exclude counts if today is Saturday (6) or Sunday (0)
                return $query->whereRaw('1 = 0'); // Ensures no results are returned if it's a weekend
            })
            ->count();

        $upcomingSessions = TutorSession::whereIn('tutor_main_id', $tutorMainID)
            ->where('session_status_id', 1)
            ->where('session_start', '>', $today)
            ->count();

        $completedSessions = TutorSession::whereIn('tutor_main_id', $tutorMainID)
            ->where('session_status_id', 2)
            ->count();

        $ongoingSessions = TutorSession::whereIn('tutor_main_id', $tutorMainID)
            ->where('session_status_id', 1)
            ->count();

        //dd($sessionsToday);
        $response = [
            'today' => $sessionsToday,
            'upcoming' => $upcomingSessions,
            'completed' => $completedSessions,
            'ongoing' => $ongoingSessions,
        ];
        //dd($response);
        return response()->json($response);
    }

    public function Terminate(Request $request)
    {
        $loggedUserID = session('loginId');
        $sessionID = $request->input('sessionID');
        $receiverId = $request->input('parentID');
        $senderId = $request->input('tutorID');

        $tutorSession = TutorSession::where('id', $sessionID)->first();

        $user = UserProfile::find($loggedUserID);
        $username = "$user->fname $user->lname";


        if ($tutorSession->terminate == 1 && $tutorSession->terminate < 2) {
            $tutorSession->session_status_id = 3;
            $tutorSession->save();
        }

        if ($loggedUserID == $senderId) {

            //create new notification
            $Notif = new Notification();
            $Notif->user_id = $receiverId; //receiver
            $Notif->title = "A tutor has terminated your tutoring session";
            $Notif->author = $username; //sender
            $Notif->content = "";
            $Notif->notification_type = 1; //1 for notif 2 for message 3 for announcement
            $Notif->user_type = 1;
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

        return response()->json(['success' => true, 'message' => 'Session terminated successfully']);
    }
}
