<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\ApiInvoiceRequest;
use App\Models\Availability;
use App\Models\Booking;
use App\Models\BookingAvailability;
use App\Models\BookingDuration;
use App\Models\Children;
use App\Models\Credential;
use App\Models\Day;
use App\Models\DayAvailability;
use App\Models\DayAvailabilitySessionFinal;
use App\Models\DayAvailabilitySessionType;
use App\Models\Department;
use App\Models\DepartmentYearSubject;
use App\Models\EmploymentSession;
use App\Models\GuardianMain;
use App\Models\Language;
use App\Models\Modality;
use App\Models\Notification;
use App\Models\Preference;
use App\Models\PreferenceLanguage;
use App\Models\Rates;
use App\Models\SessionTypes;
use App\Models\Subject;
use App\Models\TeachingStyle;
use App\Models\Tutor;
use App\Models\TutorMain;
use App\Models\TutorSession;
use App\Models\UserProfile;
use App\Models\YearLevel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\InvoiceItem;

class ClientFindTutorController extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }
    public function index(Request $request)
    {
        //dd(session::all())l;
        $department = Department::get()->all();

        $subject = Subject::get()->all();

        $yearLevel = YearLevel::get()->all();

        $modality = Modality::get()->all();

        $teachingStyle = TeachingStyle::get()->all();

        $availability = Availability::get()->all();

        $sessionType = SessionTypes::get()->all();
        $day = Day::get()->all();

        $language = Language::get()->all();


        $guardianId = session('clientMain')->guardian->id;
        $child = GuardianMain::with([
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
            'preferenceLanguage.language'
        ])->where('guardian_id', $guardianId)->get();



        //dd($child);

        return view('parent.parentfindtutor', compact('department', 'subject', 'yearLevel', 'modality', 'teachingStyle', 'language', 'sessionType', 'child', 'availability', 'day'));
    }

    public function findTutor(Request $request)
    {
        $modality = $request->input('modality');
        $grade = $request->input('grade');
        $language = array_filter($request->input('language'));
        $child_id = $request->input('child_id');
        $learnStyle = $request->input('learnStyle');
        $subjects = explode(',', $request->input('subject'));
        $session = $request->input('sessionType');

        $day = $request->input('day');

        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');

        $childProfile = Children::find($child_id);

        if (!$childProfile) {
            return redirect()->back()->with('fail', 'Child not found.');
        }

        $childName = $childProfile->fname . ' ' . $childProfile->lname;

        Session::put('child_id', $child_id);
        Session::put('modality', $modality);
        Session::put('grade', $grade);
        Session::put('language', $language);
        Session::put('learningStyle', $learnStyle);
        Session::put('session', $session);

        //dd(session('session'));
        //dd([$modality,$grade,$language,$child_id,$learnStyle]);

        //$guardianId= session('clientMain')->guardian->id;

        //dd($session);

        //filtering for departmentYearSubject
        if ($grade && $subjects) {

            $findDept = DepartmentYearSubject::where('year_id', $grade)
                ->whereIn('subject_id', $subjects)
                ->get();
        } else {
            $findDepy = DepartmentYearSubject::all();
        }

        if ($session) {
            $findEmploy = EmploymentSession::where('session_type_id', $session)
                ->get();
        } else {
            $findEmploy = EmploymentSession::all();
        }

        if ($findEmploy) {
            $findTutor = [];

            $findTutor = Tutor::whereIn('employment_session_id', $findEmploy->pluck('id'))->get();
        } else {
            $findTutor = Tutor::all();
        }
        //dd($findTutor);

        //filtering for preferenceLanguage
        if ($language && $learnStyle && $modality) {
            $findPref = PreferenceLanguage::where('languages', 'LIKE', '%' . $language[1] . '%')
                ->whereHas('preference', function ($query) use ($learnStyle, $modality) {
                    $query->where('teaching_style_id', $learnStyle)
                        ->where('modality_id', $modality);
                })->get();
        } else {
            return redirect()->back();
        }

        //dd($findPref);

        $findAvailability = DayAvailabilitySessionFinal::where('session_type_id', $session)
            ->orWhere('day_id', $day)
            ->orWhere('availability_start_id', $startTime)
            ->orWhere('availability_end_id', $endTime)
            ->get();


        //dd($availabilityTimes);
        $filter = TutorMain::with(
            'tutor.userProfile',
            'tutor.userProfile.gender',
            'tutor.userProfile.userStatus',
            'tutor.userProfile.userType',
            'tutor.employmentSession',
            'tutor.employmentSession.sessionType',
            'tutor.employmentSession.employmentType',
            'educationLevel',
            'requirement',
            'preferenceLanguage',
            'preferenceLanguage.preference',
            'preferenceLanguage.preference.teachingStyle',
            'preferenceLanguage.preference.modality',
            'preferenceLanguage.preference.availability',
            'departmentYearSubject.department',
            'departmentYearSubject.subject',
            'departmentYearSubject.gradeLevel'
        )
            ->where(function ($query) use ($findDept, $findPref, $findTutor) {
                $query->orWhereIn('department_year_subject_id', $findDept->pluck('id'))
                    ->orWhereIn('preference_language_id', $findPref->pluck('id'))
                    ->orWhereIn('tutor_id', $findTutor->pluck('id'));
            })->whereIn('id', $findAvailability->pluck('tutor_main_id'))
            ->get();

        //$session_type_id = $filter->tutor->employmentSession->sessionType->id;
        //$modality_id = $filter->tutor->employmentSession->sessionType->id;
        //$session_type_id = $filter->tutor->employmentSession->sessionType->id;

        // Loop through each result to get relevant IDs and query the rates table
        $filter->each(function ($item) {
            $modalityId = optional($item->preferenceLanguage->preference[0]->modality)->id;
            $sessionTypeId = optional($item->tutor->employmentSession->sessionType)->id;
            $gradeLevelId = optional($item->departmentYearSubject->gradeLevel)->id;

            // Query the rates table
            $rate = Rates::where('modality_id', $modalityId)
                ->where('session_type_id', $sessionTypeId)
                ->where('year_level_id', $gradeLevelId)
                ->value('rate');

            // Attach the rate to the current item
            $item->rate = $rate;
        });

        //dd($filter);
        $tutorRatings = DB::table('feedback')
    ->join('tutor_sessions', 'feedback.tutor_sessions_id', '=', 'tutor_sessions.id')
    ->join('tutor_main', 'tutor_sessions.tutor_main_id', '=', 'tutor_main.id')
    ->whereIn('tutor_main.id', $filter->pluck('id')->all())
    ->groupBy('tutor_main.id')
    ->select(
        'tutor_main.id',
        DB::raw('ROUND(AVG(feedback.engagement), 2) as avg_engagement'),
        DB::raw('ROUND(AVG(feedback.patience), 2) as avg_patience'),
        DB::raw('ROUND(AVG(feedback.preparedness), 2) as avg_preparedness'),
        DB::raw('ROUND(AVG(feedback.relevance), 2) as avg_relevance'),
        DB::raw('ROUND(AVG(feedback.pace), 2) as avg_pace'),
        DB::raw('ROUND(AVG(feedback.overall), 2) as avg_overall')
    )
    ->get();

    $filter = $filter->sortBy(function ($tutor) use ($tutorRatings) {
        $rating = $tutorRatings->where('id', $tutor->id)->first();
    
        if ($rating) {
            $averageRating = collect([
                $rating->avg_engagement ?? 0,
                $rating->avg_patience ?? 0,
                $rating->avg_preparedness ?? 0,
                $rating->avg_relevance ?? 0,
                $rating->avg_pace ?? 0,
                $rating->avg_overall ?? 0,
            ])->average();
    
            $tutor->average_rating = $averageRating;
            return $averageRating;
        }
    
        $tutor->average_rating = 0;
        return 0;
    })->reverse();
    


        //dd($filter);
        if (is_null($filter)) {
            return redirect()->back()->withErrors('No tutors found matching your criteria.');
        }


        //dd($filter);
        $tutor_details = TutorMain::find($filter)->value('id');



        $dayAvailabilitySessionTypeFinal = DayAvailabilitySessionFinal::with(
            'day',
            'availabilityStart',
            'availabilityEnd',
        )
            ->whereIn('tutor_main_id', $filter->pluck('id'))
            ->orderBy('day_id', 'ASC')
            ->get()
            ->groupBy('tutor_main_id');

        //dd($dayAvailabilitySessionTypeFinal);

        $credentials = Credential::where('tutor_main_id', $tutor_details)->get();

        //dd($credentials);

        //return $dayAvailabilitySessionTypeFinal;
        //dd($dayAvailabilitySessionTypeFinal);

        //dd([$filter,$filterLanguage]);

        $department = Department::get()->all();

        $subject = Subject::get()->all();

        $yearLevel = YearLevel::get()->all();

        $modality = Modality::get()->all();

        $teachingStyle = TeachingStyle::get()->all();

        $language = Language::get()->all();

        $sessionType = SessionTypes::get()->all();

        $day = Day::get()->all();

        $availability = Availability::get()->all();

        $guardianId = session('clientMain')->guardian->id;

        $child = GuardianMain::with([
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
            'preferenceLanguage.language'
        ])->where('guardian_id', $guardianId)->get();


        $bookingDuration = BookingDuration::all();
        //dd([$filter, $filterLang, $filterLanguage]);
        session()->flash('matched', 'Successfully matched tutors for <strong>' . $childName . '</strong>');
        return view(
            'parent.parentfindtutor',
            compact(
                'credentials',
                'dayAvailabilitySessionTypeFinal',
                'filter',
                'availability',
                'day',
                'department',
                'subject',
                'yearLevel',
                'modality',
                'teachingStyle',
                'language',
                'sessionType',
                'child',
                'bookingDuration'
            )
        );
    }

    public function book(Request $request)
    {
        $child_id = Session::get('child_id');
        $language = Session::get('language');
        $learnStyle = Session::get('learnStyle');
        $guardianID = session('clientMain')->guardian->id;

        //dd($child_id);

        //dd($request->all());
        //requests
        $request->merge(['finalChildId' => $child_id]);
        $tutorMainID = $request->input('finalTutorId');
        //dates
        $sessionStartDate = $request->input('finalStartDate');
        $sessionEndDate = $request->input('finalEndDate');
        //avaialability
        $finalDay = $request->input('finalDay');
        $finalStartTime = $request->input('selectedStartTime');
        $finalEndTime = $request->input('selectedEndTime');
        //duration and multiplier for more than once hourly session
        $bookingDuration = $request->input('bookingDuration');
        $rateMultiplier = (int) $request->input('finalMultiplier');
        //
        //dd($bookingDuration);
        //$child = $request->input('finalChildId');
        //$tutorId = $request->input('tutorId');
        //$finalDate = $request->input('finalDate');

        $tutorMain = TutorMain::with(
            'preferenceLanguage.preference.modality',
            'departmentYearSubject',
            'tutor.userProfile',
            'tutor.employmentSession'
        )
            ->find($tutorMainID);
        //dd($tutorMain);
        if (!$tutorMain) {
            session()->flash('fail', 'Tutor does not exist.');
            return redirect()->route('parent.find.tutor');
        }

        $modality = $tutorMain->preferenceLanguage->preference[0]->modality_id;
        $grade = $tutorMain->departmentYearSubject->year_id;
        $session = $tutorMain->tutor->employmentSession->session_type_id;

        //dd(['modality' => $modality,'grade' => $grade,'session' => $session]);


        if (!$finalDay) {
            return redirect()->back()->with('error', 'Please select a day');
        }

        if (!$finalStartTime) {
            return redirect()->back()->with('error', 'Please select a start time');
        }

        if (!$finalEndTime) {
            return redirect()->back()->with('error', 'Please select an end time');
        }

        if (!$sessionStartDate) {
            return redirect()->back()->with('error', 'Please select a start date');
        }

        if ($session == 2) {
            if (!$bookingDuration) {
                return redirect()->back()->with('error', 'Please select a booking duration');
            }
            if ($bookingDuration == 2 && !$sessionEndDate) {
                return redirect()->back()->with('error', 'Please select an end date');
            }
        }

        $tutorRate = Rates::where('modality_id', $modality)
            ->where('year_level_id', $grade)
            ->where('session_type_id', $session)
            ->first();

        if (!$tutorRate) {
            session()->flash('fail', 'Rates does not exist.');
            return redirect()->route('parent.find.tutor');
        }

        //dd(['modality' => $modality,'grade' => $grade,'session' => $session, 'rate table' => $tutorRate]);
        $child = Children::find($child_id);

        if (!$child) {
            session()->flash('fail', 'Child does not exist.');
            return redirect()->route('parent.find.tutor');
        }

        $guardianMain = GuardianMain::where('child_id', $child_id)
            ->where('guardian_id', $guardianID)
            ->first();

        //dd(['session child id' => $child_id, 'child profile' => $child, 'guardianMain' => $guardianMain]);

        if (!$guardianMain) {
            session()->flash('fail', 'guardian main does not exist.');
            return redirect()->route('parent.find.tutor');
        }

        $finalEndDate = null;
        if ($session == 2 && $bookingDuration == 2 && $sessionEndDate) {
            $finalEndDate = $sessionEndDate;
        } elseif ($session == 1 && !$sessionEndDate) {
            // Add 1 month to the start date
            $finalEndDate = Carbon::parse($sessionStartDate)->addMonth();
        } elseif ($session == 2 && $bookingDuration == 1 && !$sessionEndDate) {
            // Add 1 day to the start date
            $finalEndDate = Carbon::parse($sessionStartDate)->addDay();
        }

        $guardianMainID = $guardianMain->id;
        $rateID = $tutorRate->id;
        $rateValue = $tutorRate->rate;
        $parentName = $guardianMain->guardian->userProfile->fname . ' ' . $guardianMain->guardian->userProfile->lname;

        //dd(['session child id' => $child_id, 'child profile' => $child, 'guardianMain' => $guardianMain, 'rate' => $rateValue, 'parent name' => $parentName]);

        $finalRate = null;

        if ($session == 2 && $bookingDuration == 2 && $rateMultiplier !== null) {
            $finalRate = (int)$rateValue * $rateMultiplier;
        } else {
            $finalRate = $rateValue;
        }

        //dd(['session type' => $session, 'booking duration' => $bookingDuration, 'final start date' => $sessionStartDate, 'final end date' => $finalEndDate, 'modality' => $modality, 'year level' => $grade, 'original rate' => $rateValue, 'business days/multiplier' => $rateMultiplier, 'final rate' => $finalRate]);


        $existingBooking = Booking::where('guardian_main_id', $guardianMainID)
            ->where('tutor_main_id', $tutorMainID)
            ->first();

        $existingSession = TutorSession::where('guardian_main_id', $guardianMainID)
            ->where('tutor_main_id', $tutorMainID)
            ->first();

        if ($existingBooking && $existingBooking->booking_status_id == 2) {
            session()->flash('fail', 'You have a pending booking with this tutor.');
            return redirect()->route('parent.find.tutor');
        }

        if ($existingSession && $existingSession->session_status_id == 1) {
            session()->flash('fail', 'You have an ongoing tutoring session with this tutor.');
            return redirect()->route('parent.find.tutor');
        }

        //dd('no existing booking and session', $finalRate);

        DB::beginTransaction();
        try {
            // create new booking and send notification
            // Use your Xendit service or any external API to generate invoice

            $bookingAvailability = new BookingAvailability();
            $bookingAvailability->day_id = $finalDay;
            $bookingAvailability->availability_start_id = $finalStartTime;
            $bookingAvailability->availability_end_id = $finalEndTime;
            $bookingAvailability->session_type_id = $session;
            $bookingAvailability->save();

            $booking = new Booking();
            $booking->tutor_main_id = $tutorMainID;
            $booking->guardian_main_id = $guardianMainID;
            $booking->rates_id = $rateID;
            $booking->booking_availability_id = $bookingAvailability->id;
            $booking->session_start_date = $sessionStartDate;
            $booking->session_end_date = $finalEndDate;
            $booking->booking_status_id = 2;

            if ($session == 2) {
                $booking->rate_multiply = $finalRate;
            }
            $booking->save();

            $bookingId = $booking->id;

            $receiverId = $booking->tutorMain->tutor->user_profile_id;

            $loggedUserID = session('loginId');

            $user = UserProfile::find($loggedUserID);
            $username = "$user->fname $user->lname";
            $userType = $user->userType->type;

            if ($loggedUserID) {
                // create new notification
                $Notif = new Notification();
                $Notif->user_id = $receiverId; // receiver
                $Notif->title = "A Parent requested to book you as a tutor";
                $Notif->author = $username; // sender
                $Notif->content = "";
                $Notif->notification_type = 1; // 1 for notif 2 for message 3 for announcement
                $Notif->user_type = 2;
                $Notif->seen = 0;
                $Notif->booking_id = $bookingId;
                $Notif->tutoring_session_id = 0;
                $Notif->created_at = now()->setTimezone(config('app.timezone'));
                $Notif->save();
            }

            DB::commit();
            // send notification
            event(new UserNotification([
                'user_id' => $receiverId,
                'user_type' => '',
                'author' => $Notif->author,
                'title' => $Notif->title,
                'content' => $Notif->content,
                'time' => $Notif->created_at,
                'type' => $Notif->notification_type
            ]));

            // end
            Session::forget('child_id');
            Session::forget('language');
            Session::forget('learnStyle');

            // return success message saying Booked tutor successfully
            session()->flash('success', 'Booked tutor successfully!');
            return redirect()->route('parent.find.tutor');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        }
    }


    public function getPreference(Request $request)
    {
        $childId = $request->query('id');

        $data = GuardianMain::where('child_id', $childId)->first();

        if (!$data) {
            // Return an error response or throw an exception
            return response()->json(['error' => 'No data found'], 404);
        }

        $preference = $data->preferenceLanguage;

        if (!$preference || !$preference->preference) {
            // Return an error response or throw an exception
            return response()->json(['error' => 'No preference data found'], 404);
        }

        $child = $data->child;

        $response = [];
        foreach ($preference->preference as $pref) {
            $response[] = [
                'modality' => $pref->modality,
                'teachingStyle' => $pref->teachingStyle,
                'yearLevel' => $data->child->yearLevel,
                'language' => $preference->languages,
                'child' => $child,


            ];
        }

        if (empty($response)) {
            // Return an error response or throw an exception
            return response()->json(['error' => 'No preference data found'], 404);
        }

        return $response;
    }

    public function getStartTimes(Request $request)
    {
        /*$day_id = $request->input('day_id');
        $tutor_main_id = $request->input('tutor_main_id');

        // Get booked times from the tutorSession table through the BookingAvailability relationship
        $bookedSessions = TutorSession::with('bookingAvailability')
            ->where('tutor_main_id', $tutor_main_id)
            ->where('session_status_id', 1)
            ->get()
            ->pluck('bookingAvailability.availability_start_id')
            ->toArray();

        // Fetch start times for the selected day, excluding already booked times
        $startTimes = DayAvailabilitySessionFinal::where('day_id', $day_id)
            ->where('tutor_main_id', $tutor_main_id)
            ->whereNotIn('availability_start_id', $bookedSessions) // Exclude booked times
            ->with('availabilityStart')
            ->get()
            ->map(function ($availability) {
                return [
                    'id' => $availability->availabilityStart->id,
                    'availability' => $availability->availabilityStart->availability
                ];
            });

        return response()->json($startTimes);*/

        $day_id = $request->input('day_id');
        $tutor_main_id = $request->input('tutor_main_id');

        // Get booked times from the tutorSession table through the BookingAvailability relationship
        $bookedSessions = TutorSession::with('bookingAvailability')
            ->where('tutor_main_id', $tutor_main_id)
            ->where('session_status_id', 1)
            ->get()
            ->pluck('bookingAvailability.availability_start_id')
            ->toArray();

        // Fetch availability sessions for the selected day
        $availableSessions = DayAvailabilitySessionFinal::where('day_id', $day_id)
            ->where('tutor_main_id', $tutor_main_id)
            ->when(!empty($bookedSessions), function ($query) use ($bookedSessions) {
                return $query->whereNotIn('availability_start_id', $bookedSessions); // Exclude booked times if any
            })
            ->with(['availabilityStart', 'availabilityEnd']) // Assuming 'availabilityEnd' holds the end time
            ->get();

        // Check if no available sessions are found
        if ($availableSessions->isEmpty()) {
            return response()->json([]); // No availability sessions
        }

        // Generate start times based on availability_start_id and availability_end_id range
        $startTimes = $availableSessions->flatMap(function ($availability) use ($bookedSessions) {
            // Check if availabilityStart and availabilityEnd exist
            if (is_null($availability->availabilityStart) || is_null($availability->availabilityEnd)) {
                return []; // Skip this session if start or end is missing
            }

            $startId = $availability->availabilityStart->id;
            $endId = $availability->availabilityEnd->id;

            $intervals = [];
            for ($id = $startId; $id < $endId; $id++) {
                // Only add times that are not in the booked sessions
                if (empty($bookedSessions) || !in_array($id, $bookedSessions)) {
                    $availabilityTime = Availability::find($id); // Fetch only once per ID
                    if ($availabilityTime) { // Ensure availability is found
                        $intervals[] = [
                            'id' => $availabilityTime->id,
                            'availability' => $availabilityTime->availability
                        ];
                    }
                }
            }

            return $intervals;
        });
        $sortedStartTimes = $startTimes->sortBy('id');
        return response()->json($sortedStartTimes->values());
    }

    public function getEndTimes(Request $request)
    {
        /*$start_time_id = $request->input('start_time_id');
        $day_id = $request->input('day_id');  // Get the day ID from the request

        // Fetch the availability session final record based on selected start time and day
        $availabilitySession = DayAvailabilitySessionFinal::where('availability_start_id', $start_time_id)
            ->where('day_id', $day_id)
            ->first();

        if ($availabilitySession) {
            $availability_start_id = $availabilitySession->availability_start_id;
            $availability_end_id = $availabilitySession->availability_end_id;

            // Fetch all availability times between start and end time (inclusive)
            $endTimes = Availability::whereBetween('id', [$availability_start_id, $availability_end_id])
                ->orderBy('id', 'asc')  // Ensure it's ordered by time
                ->get();

            // Map the result to return ID and availability time
            $endTimes = $endTimes->map(function ($time) {

                return [
                    'id' => $time->id,
                    'availability' => $time->availability
                ];
            });
            Log::info('End Times Data:', $endTimes->toArray());

            return response()->json($endTimes);
        }

        return response()->json([]);  // Return an empty array if no data is found*/

        $start_time_id = $request->input('start_time_id');
        $day_id = $request->input('day_id');

        // Fetch the availability session final record based on the day and tutor
        $availabilitySession = DayAvailabilitySessionFinal::where('day_id', $day_id)
            ->where('availability_start_id', '<=', $start_time_id)  // Ensure start time is within range
            ->where('availability_end_id', '>=', $start_time_id)
            ->first();

        if ($availabilitySession) {
            $availability_start_id = $availabilitySession->availability_start_id;
            $availability_end_id = $availabilitySession->availability_end_id;

            $validStartTimeId = $start_time_id + 2;

            // Fetch all availability times between the start and end time (inclusive)
            $timesInRange = Availability::whereBetween('id', [$validStartTimeId, $availability_end_id])
                ->orderBy('id', 'asc')  // Ensure it's ordered by time
                ->get();

            // Map the result to return ID and availability time
            $endTimes = $timesInRange->map(function ($time) {
                return [
                    'id' => $time->id,
                    'availability' => $time->availability
                ];
            });

            //Log::info('Times in Range:', $endTimes->toArray());

            return response()->json($endTimes);
        }

        return response()->json([]);  // Return an empty array if no data is found
    }


    //BOOKINGS FUNCTIONS
    public function loadBookings()
    {
        //dd(session::all());

        $guardianId = session('clientMain')->guardian->id;

        $bookings = Booking::whereHas('guardianMain', function ($query) use ($guardianId) {
            $query->where('guardian_id', $guardianId); // Assuming 'guardian_id' is the column in the related table
        })
            ->with([
                'tutorMain.tutor.userProfile.gender',
                'tutorMain.tutor.userProfile.userStatus',
                'tutorMain.tutor.userProfile.userType',
                'tutorMain.tutor.employmentSession',
                'tutorMain.tutor.employmentSession.sessionType',
                'tutorMain.tutor.employmentSession.employmentType',
                'tutorMain.educationLevel',
                'tutorMain.requirement',
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
                // Guardian relationships
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
                }
            ])
            ->where('booking_status_id', 2)
            ->orderBy('session_start_date', 'ASC')
            ->get();

        return response()->json($bookings);
        //dd($bookings);
    }
    public function cancelBooking(Request $request)
    {
        $bookingId = $request->input('cancelBookingId');
        $message = $request->input('reason');
        $receiverId = $request->input('receiverId');
        $loggedUserID = session('loginId');
        $user = UserProfile::find($loggedUserID);
        $username = "$user->fname $user->lname";

        $booking = Booking::find($bookingId);
        $notification = Notification::where('booking_id', $bookingId);

        if (!$booking && !$notification) {
            return response()->json(['error' => true, 'message' => 'Booking not found'], 404);
        }

        try {
            DB::beginTransaction();

            // Perform the delete operation
            $booking->delete();
            $notification->delete();

            //create new notification
            $Notif = new Notification();
            $Notif->user_id = $receiverId; //receiver
            $Notif->title = "Parent $username cancelled a booking";
            $Notif->author = $username; //sender
            $Notif->content = "<span class='fw-bold'>Reason for cancellation: </span> <br><br> $message";
            $Notif->notification_type = 1; //1 for notif 2 for message 3 for announcement
            $Notif->user_type = 2;
            $Notif->seen = 0;
            $Notif->booking_id = 0;
            $Notif->tutoring_session_id = 0;
            $Notif->created_at = now()->setTimezone(config('app.timezone'));
            $Notif->save();

            // Commit the transaction
            DB::commit();

            //send notification
            event(new UserNotification([
                'user_id' => $receiverId,
                'user_type' => '',
                'author' => $Notif->author,
                'title' => 'A parent cancelled a booking',
                'content' => $Notif->content,
                'time' => $Notif->created_at,
                'type' => $Notif->notification_type
            ]));


            return response()->json(['success' => true, 'message' => 'Booking cancelled successfully'], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            return response()->json(['error' => true, 'message' => 'Failed to cancel booking', 'error' => $e->getMessage()], 500);
        }
    }

    //
}
