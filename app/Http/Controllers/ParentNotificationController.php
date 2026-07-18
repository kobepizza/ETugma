<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Feedback;
use App\Models\Notification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ParentNotificationController extends Controller
{
    public function index()
    {
        //dd(session('user_profiles')->created_at);
        return view('parent.parentnotif');
    }

    public function loadNotifs()
    {
        $loggedUserID = session('loginId');
        $accountCreation = session('user_profiles')->created_at;

        $notifs = Notification::where(function ($query) use ($loggedUserID, $accountCreation) {
            $query->where('user_id', $loggedUserID)
                ->where('user_type', 1)
                ->where('notification_type', 1)
                ->where('created_at', '>=', $accountCreation);
        })->orWhere(function ($query) use ($accountCreation) {
            $query->where('user_type', 1)
                ->where('notification_type', 3)
                ->where('created_at', '>=', $accountCreation);
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
        $accountCreation = session('user_profiles')->created_at;

        $notifCount = Notification::where('user_type', 1)
            ->where(function ($query) use ($LoggedUserId, $accountCreation) {
                $query->where(function ($subQuery) use ($LoggedUserId, $accountCreation) {
                    $subQuery->where('user_id', $LoggedUserId)
                        ->where('notification_type', 1)
                        ->where('seen', 0)
                        ->where('created_at', '>=', $accountCreation);
                })
                    ->orWhere(function ($subQuery) use ($accountCreation) {
                        $subQuery->where('notification_type', 3)
                            ->where('seen', 0)
                            ->where('created_at', '>=', $accountCreation);
                    });
            })
            ->count();

        return response()->json($notifCount);
    }

    public function getNotifDetails(Request $request)
    {
        $notifId = $request->input('notif_id');
        $notifType = $request->input('notif_type');

        $notif = Notification::with(
            'booking.bookingStatus',
            'booking.bookingAvailability.day',
            'booking.bookingAvailability.availabilityStart',
            'booking.bookingAvailability.availabilityEnd',
            'booking.bookingAvailability.sessionType',
            'booking.tutorMain.tutor.userProfile',
            'booking.tutorMain.departmentYearSubject.subject',
            'booking.tutorMain.departmentYearSubject.gradeLevel',
            'booking.guardianMain.guardian.userProfile',
            'booking.guardianMain.child',
            'tutorsession.sessionStatus',
            'tutorsession.bookingAvailability.sessionType',
            'tutorsession.tutorMain.departmentYearSubject.subject',
            'tutorsession.tutorMain.departmentYearSubject.gradeLevel',
            'tutorsession.tutorMain.tutor.userProfile',
            'tutorsession.guardianMain.child',
            'tutorsession.guardianMain.guardian.userProfile'
        )
            ->where('id', $notifId)
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
                        'type' => $type,
                        'content' => $notif->content,
                        'booking_id' => $bookingID,
                        'title' => $notif->title,
                        'status' => $notif->booking->bookingStatus->status,
                        'statusID' => $notif->booking->bookingStatus->id,
                        'day' => $notif->booking->bookingAvailability->day->day,
                        'time' => $notif->booking->bookingAvailability->availabilityStart->availability . ' - ' . $notif->booking->bookingAvailability->availabilityEnd->availability,
                        'date' => $notif->booking->session_start_date,
                        'tutorFname' => $notif->booking->tutorMain->tutor->userProfile->fname,
                        'tutorLname' => $notif->booking->tutorMain->tutor->userProfile->lname,
                        'subject' => $notif->booking->tutorMain->departmentYearSubject->subject->subjects,
                        'year' => $notif->booking->tutorMain->departmentYearSubject->gradeLevel->year,
                        'guardianFname' => $notif->booking->guardianMain->guardian->userProfile->fname,
                        'guardianLname' => $notif->booking->guardianMain->guardian->userProfile->lname,
                        'childFname' => $notif->booking->guardianMain->child->fname,
                        'childLname' => $notif->booking->guardianMain->child->lname,
                        'created_at' => $notif->created_at
                    ];
                    return response()->json($response);
                } elseif ($type == 1 && $bookingID <= 0 && $sessionID > 0) { // if notification is about tutoring session
                    $response = [

                        'type' => $type,
                        'content' => $notif->content,
                        'booking_id' => $bookingID,
                        'tutoring_session_id' => $sessionID,
                        'title' => $notif->title,
                        'subject' => $notif->tutorsession->tutorMain->departmentYearSubject->subject->subjects,
                        'year' => $notif->tutorsession->tutorMain->departmentYearSubject->gradeLevel->year,
                        'tutor' => $notif->tutorsession->tutorMain->tutor->userProfile,
                        'student' => $notif->tutorsession->guardianMain->child,
                        'guardian' => $notif->tutorsession->guardianMain->guardian->userProfile,
                        'session_type' => $notif->tutorsession->bookingAvailability->sessionType->type,
                        'session_start' => $notif->tutorsession->session_start,
                        'session_end' => $notif->tutorsession->session_end,
                        'status' => $notif->tutorsession->sessionStatus,
                        'termination' => $notif->tutorsession->terminate,
                        'created_at' => $notif->created_at

                    ];
                    return response()->json($response);
                } else { //if system notification
                    $response = [
                        'type' => $notif->notification_type,
                        'booking_id' => $bookingID,
                        'title' => $notif->title,
                        'content' => $notif->content,
                        'booking_id' => $notif->booking_id,
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

    public function parentFeedback(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'performance_ratings' => 'required|array',
                'performance_ratings.*' => 'required|integer|between:1,5',
                'effectiveness_ratings' => 'required|array',
                'effectiveness_ratings.*' => 'required|integer|between:1,5',
            ]);
    
            $tutorSessionId = $request->input('tutor_session_id');
            $feedbackInput = $request->input('feedback');
    
            $existingFeedback = Feedback::where('tutor_sessions_id', $tutorSessionId)->first();
    
            if ($existingFeedback) {
                DB::rollBack();
                return redirect()->back()->with('fail', 'You have already sent feedback for this session.');
            }
    
            $feedback = new Feedback();
            $feedback->feedback = $feedbackInput ?? null;
            $feedback->tutor_sessions_id = $tutorSessionId;
    
            // Map performance ratings to their respective columns
            $performanceRatings = $request->input('performance_ratings');
            $feedback->engagement = $performanceRatings[0];
            $feedback->patience= $performanceRatings[1];
            $feedback->preparedness= $performanceRatings[2];
    
            // Map effectiveness ratings to their respective columns
            $effectivenessRatings = $request->input('effectiveness_ratings');
            $feedback->relevance= $effectivenessRatings[0];
            $feedback->pace= $effectivenessRatings[1];
            $feedback->overall= $effectivenessRatings[2];
    
            $feedback->save();
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Feedback sent successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error sending feedback: ' . $e->getMessage());
        }
    }
    

}
