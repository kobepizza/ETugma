<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use App\Models\EmploymentType;
use App\Models\Feedback;
use App\Models\SessionTypes;
use App\Models\Subject;
use App\Models\TutorMain;
use App\Models\TutorSession;
use App\Models\UserProfile;
use App\Models\UserStatus;
use App\Models\VerificationStatus;
use App\Models\YearLevel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeadAdminTutorSessionsController extends Controller
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

        return view('head_admin.headadmintutorsession',compact('subjects', 'yearLevel', 'profilePic'));
    }
    
        public function loadTutorSessions()
        {

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
            )->orderBy('created_at', 'ASC')->get();

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
                    
                ];
            }

            //dd($tutorSessions);
            if ($tutorSessions) {
                return response()->json($response);
            } else {
                return response()->json(['error' => 'Error Fetching Sessions']);
            }
        }

    public function countSessions()
    {
        $today = Carbon::now()->setTimezone(config('app.timezone'))->toDateString();
        $todayDayOfWeek = Carbon::now()->setTimezone(config('app.timezone'))->dayOfWeek; // 0 (Sunday) to 6 (Saturday)
    
        // Count sessions for today (excluding weekends)
        $sessionsToday = TutorSession::where('session_status_id', 1)
            ->where('session_start', '<=', $today)
            ->where('session_end', '>=', $today)
            ->when($todayDayOfWeek === 0 || $todayDayOfWeek === 6, function ($query) {
                // Exclude counts if today is Saturday (6) or Sunday (0)
                return $query->whereRaw('1 = 0'); // Ensures no results are returned if it's a weekend
            })
            ->count();
    
        // Count upcoming sessions
        $upcomingSessions = TutorSession::where('session_status_id', 1)
            ->where('session_start', '>', $today)
            ->count();
    
        // Count completed sessions
        $completedSessions = TutorSession::where('session_status_id', 2)
            ->count();
    
        // Count all ongoing sessions (active status)
        $ongoingSessions = TutorSession::where('session_status_id', 1)
            ->count();
    
        $response = [
            'today' => $sessionsToday,
            'upcoming' => $upcomingSessions,
            'completed' => $completedSessions,
            'ongoing' => $ongoingSessions,
        ];
    
        return response()->json($response);
    }

    
        public function loadFeedbacks($sessionId)
        {
            $feedbacks = Feedback::with([
                'tutorSession.guardianMain.guardian.userProfile',
                'tutorSession.guardianMain.child',
            ])
                ->where('tutor_sessions_id', $sessionId)
                ->orderBy('created_at', 'DESC')
                ->get();
        
            if ($feedbacks->isEmpty()) {
                return response()->json([]);
            }
        
            return response()->json($feedbacks);
        }
    

       
        public function getCompleteSessions()
{
    $completeSessions = TutorSession::where('session_status_id', 2) // Assuming status_id 2 corresponds to "Complete"
    ->get();

    return response()->json($completeSessions);
}


}
