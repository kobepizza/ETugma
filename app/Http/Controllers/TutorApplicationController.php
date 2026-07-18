<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Mail\TransactionMailing;
use App\Models\Booking;
use App\Models\DayAvailabilitySessionFinal;
use App\Models\GuardianMain;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\TutorSession;
use App\Models\UserProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Paymongo\PaymongoClient;

class TutorApplicationController extends Controller
{
    public function index()
    {


        $userProfile = Session::get('user_profiles')->id;
        $user_id = Session::get('tutorMain')->id;
        //dd($user_id);
        $user_pref = Session::get('tutorLang');


        $applicants = Booking::with([
            'guardianMain' => function ($query) {
                $query->with([
                    'guardian.userProfile',
                    'guardian.userProfile.gender',
                    'guardian.userProfile.userType',
                    'guardian.userProfile.userStatus',
                    'guardian.relation',
                    'child.gender',
                    'child.yearLevel',
                    'preferenceLanguage.preference.teachingStyle',
                    'preferenceLanguage.preference.modality',
                    'preferenceLanguage.preference.availability',
                    'preferenceLanguage',
                ]);
            },
            'tutorMain.tutor.userProfile.gender',
            'tutorMain.tutor.userProfile.userStatus',
            'tutorMain.tutor.userProfile.userType',
            'tutorMain.tutor.employmentSession',
            'tutorMain.tutor.employmentSession.sessionType',
            'tutorMain.tutor.employmentSession.employmentType',
            'tutorMain.educationLevel',
            'tutorMain.requirement',
            'tutorMain.preferenceLanguage',
            'tutorMain.preferenceLanguage',
            'tutorMain.preferenceLanguage.preference',
            'tutorMain.preferenceLanguage.preference.teachingStyle',
            'tutorMain.preferenceLanguage.preference.modality',
            'tutorMain.preferenceLanguage.preference.availability',
            'tutorMain.departmentYearSubject.department',
            'tutorMain.departmentYearSubject.subject',
            'tutorMain.departmentYearSubject.gradeLevel',
            'rate',
            'rate.yearLevel',
            'rate.sessionType',
            'rate.modality',
            'bookingStatus',
            'bookingAvailability.sessionType',
            'bookingAvailability.day',
            'bookingAvailability.availabilityStart',
            'bookingAvailability.availabilityEnd',
        ])->where('tutor_main_id', $user_id)
            ->where('booking_status_id', 2)
            ->get();


        //dd($applicants);
        $tutorSession = TutorSession::all();
        // dd($applicants->first()->guardianMain->toArray());
        //dd($tutorSession);

        //return $applicants;
        //dd("user pref $user_pref" ,"user id $user_id");
        //dd($applicants);

        return view('tutor.tutorapplication', compact('applicants', 'tutorSession'));
    }

    public function acceptClient(Request $request)
    {
        $tutorMainID = session('tutorMain')->id;
        $sessionTypeID = session('tutorMain')->tutor->employmentSession->session_type_id;

        if (!$tutorMainID) {
            return redirect()->back()->with('error', 'You must be logged in to accept a client');
        }

        $bookingID = $request->input('bookingId');
        $confirmedStartDate = Carbon::parse($request->input('confirmStartDate'))->setTimezone(config('app.timezone'));
        $confirmedEndDate = Carbon::parse($request->input('confirmEndDate'))->setTimezone(config('app.timezone'));
        $reason = $request->input('reasonChange');

        // Fetch booking details with related models
        $findBooking = Booking::with([
            'guardianMain.guardian.userProfile',
            'guardianMain.guardian.userProfile.gender',
            'guardianMain.guardian.userProfile.userType',
            'guardianMain.guardian.userProfile.userStatus',
            'guardianMain.guardian.relation',
            'guardianMain.child.gender',
            'guardianMain.child.yearLevel',
            'guardianMain.preferenceLanguage.preference.teachingStyle',
            'guardianMain.preferenceLanguage.preference.modality',
            'guardianMain.preferenceLanguage.preference.availability',
            'guardianMain.preferenceLanguage',

            'tutorMain.tutor.userProfile.gender',
            'tutorMain.tutor.userProfile.userStatus',
            'tutorMain.tutor.userProfile.userType',
            'tutorMain.tutor.employmentSession',
            'tutorMain.tutor.employmentSession.sessionType',
            'tutorMain.tutor.employmentSession.employmentType',
            'tutorMain.educationLevel',
            'tutorMain.requirement',
            'tutorMain.preferenceLanguage',
            'tutorMain.preferenceLanguage',
            'tutorMain.preferenceLanguage.preference',
            'tutorMain.preferenceLanguage.preference.teachingStyle',
            'tutorMain.preferenceLanguage.preference.modality',
            'tutorMain.preferenceLanguage.preference.availability',
            'tutorMain.departmentYearSubject.department',
            'tutorMain.departmentYearSubject.subject',
            'tutorMain.departmentYearSubject.gradeLevel',
            'rate',
            'rate.yearLevel',
            'rate.sessionType',
            'rate.modality',
            'bookingStatus',
            'bookingAvailability.sessionType',
            'bookingAvailability.day',
            'bookingAvailability.availabilityStart',
            'bookingAvailability.availabilityEnd',
        ])->where('id', $bookingID)->first();

        if (!$findBooking) {
            return redirect()->back()->with('error', 'Booking does not exist');
        }

        $originalStartDate = Carbon::parse($findBooking->session_start_date)->setTimezone(config('app.timezone'));
        $originalEndDate = Carbon::parse($findBooking->session_end_date)->setTimezone(config('app.timezone'));


        $childId = $findBooking->guardianMain->child_id;
        if (!$childId) {
            return redirect()->back()->with('error', 'Child does not exist');
        }

        DB::beginTransaction();

        try {

            // Check if a session already exists for the same tutor and child
            if (Booking::where('tutor_main_id', $tutorMainID)
                ->whereHas('guardianMain', function ($query) use ($childId) {
                    $query->where('child_id', $childId);
                })
                ->where('booking_status_id', 1) // Ensure booking status is 1
                ->exists()
            ) {
                DB::rollBack();
                return redirect()->back()->with('error', 'You already have an active booking with this child.');
            }

            // Check if a session already exists for the same tutor and child
            if (Transaction::where('booking_id', $bookingID)
                ->where('paid', 0) // Ensure booking status is 1
                ->exists()
            ) {
                DB::rollBack();
                return redirect()->back()->with('error', 'You already have a pending transaction with this client.');
            }

            $remarks = "";

            if ($confirmedStartDate > $originalStartDate && $confirmedEndDate > $originalEndDate) {
                $findBooking->session_start_date = $confirmedStartDate;
                $findBooking->session_end_date = $confirmedEndDate;
                $remarks = "<span class='fw-bold'>Tutor adjusted session start date</span><br><br><span class='fw-bold'>Reason for adjustment:</span><br><br>$reason";

                //dd(['message'=>'Hourly sessions, start date and end date has been updated. New start date: '. $confirmedStartDate .'New end date: '. $confirmedEndDate, 'Remarks' => $remarks]);
            }
            //dd('No changes in dates. Remarks: '.$remarks);

            // Update the booking status
            $findBooking->booking_status_id = 1;
            $findBooking->save();

            // Create a new transaction
            $transaction = new Transaction();
            $transaction->booking_id = $bookingID;
            $transaction->save();


            // Send notification to the guardian
            $receiverId = $findBooking->guardianMain->guardian->user_profile_id;
            $loggedUserID = session('loginId');
            $user = UserProfile::find($loggedUserID);
            $username = "$user->fname $user->lname";
            $userType = $user->userType->type;

            if ($loggedUserID) {
                $Notif = new Notification();
                $Notif->user_id = $receiverId; // receiver
                $Notif->title = "A $userType has accepted your booking";
                $Notif->author = $username; // sender
                $Notif->content = $remarks;
                $Notif->notification_type = 1; // 1 for notification
                $Notif->user_type = 1;
                $Notif->seen = 0;
                $Notif->booking_id = $findBooking->id;
                $Notif->tutoring_session_id = 0;
                $Notif->created_at = now()->setTimezone(config('app.timezone'));
                $Notif->save();
            }

            DB::commit();

            // Send the notification event
            event(new UserNotification([
                'user_id' => $receiverId,
                'user_type' => '',
                'author' => $Notif->author,
                'title' => $Notif->title,
                'content' => $Notif->content,
                'time' => $Notif->created_at,
                'type' => $Notif->notification_type,
            ]));

            return redirect()->back()->with('success', 'Application accepted successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        }
    }

    public function deleteApplicant(Request $request)
    {
        $loggedUserID = session('loginId');
        $bookingID = $request->input('deleteBookingId');
        $reason = $request->input('reasonDecline');

        $booking = Booking::find($bookingID);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        $guardianMainID = $booking->guardian_main_id;

        $guardianMain = GuardianMain::find($guardianMainID);

        if (!$guardianMain) {
            return redirect()->back()->with('error', 'Parent not found');
        }

        $parentID = $guardianMain->guardian->user_profile_id;
        $remarks = "<span class='fw-bold'>Reason for declining:</span><br><br>$reason";

        //dd($request->all(), $booking , $guardianMain , $parentID);
        DB::beginTransaction();
        try {
            $booking->booking_status_id = 3;
            $booking->save();

            $Notif = new Notification();
            $Notif->user_id = $parentID; // receiver
            $Notif->title = "A Tutor has declined your booking";
            $Notif->author = $loggedUserID; // sender
            $Notif->content = $remarks;
            $Notif->notification_type = 1; // 1 for notification
            $Notif->user_type = 1;
            $Notif->seen = 0;
            $Notif->booking_id = $bookingID;
            $Notif->tutoring_session_id = 0;
            $Notif->created_at = now()->setTimezone(config('app.timezone'));
            $Notif->save();

            event(new UserNotification([
                'user_id' => $parentID,
                'user_type' => '',
                'author' => $Notif->author,
                'title' => $Notif->title,
                'content' => $Notif->content,
                'time' => $Notif->created_at,
                'type' => $Notif->notification_type,
            ]));

            DB::commit();
            return redirect()->back()->with('success', 'Application declined successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        }
    }
}
