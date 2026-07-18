<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Assessment;
use App\Models\AssessmentSubmissionGrade;
use App\Models\Children;
use App\Models\Grade;
use App\Models\GuardianMain;
use App\Models\Notification;
use App\Models\Subject;
use App\Models\Submission;
use App\Models\TutorSession;
use App\Models\UserProfile;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Throwable;

class ParentAssessmentController extends Controller
{

    public function index()
    {

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
        $subject = Subject::all();

        $studentId = session('clientMain')->id;

        $tutorMainIds = TutorSession::whereHas('guardianMain', function ($query) use ($studentId) {
            $query->where('id', $studentId);
        })->pluck('tutor_main_id'); // Retrieve only the IDs, not the whole collection

        $results = Assessment::where('assessment_visibility_status_id', 2)
            ->whereHas('tutorSession', function ($query) use ($tutorMainIds) {
                $query->whereIn('tutor_main_id', $tutorMainIds);
            })->get();
        //dd($results);
        return view('parent.parentassessment', compact('results', 'child', 'subject'));
    }


    public function loadAssessment(Request $request)
    {

        $childId = $request->query('childId');

        $ClientMainId = Session('clientMain')->guardian->id;
        $LoggedUserId = session('loginId');

        $guardianIds = GuardianMain::where('guardian_id', $ClientMainId)
            ->where('child_id', $childId)->get()->pluck('id');


        $tutorSessionIds = TutorSession::where('guardian_main_id', $guardianIds)->get()->pluck('id');

        $assessment = Assessment::with(
            'tutorSession.tutorMain.tutor.userProfile.gender',
            'tutorSession.tutorMain.tutor.userProfile.userStatus',
            'tutorSession.tutorMain.tutor.userProfile.userType',
            'tutorSession.tutorMain.tutor.employmentSession',
            'tutorSession.tutorMain.tutor.employmentSession.sessionType',
            'tutorSession.tutorMain.tutor.employmentSession.employmentType',
            'tutorSession.tutorMain.educationLevel',
            'tutorSession.tutorMain.requirement',
            'tutorSession.tutorMain.preferenceLanguage',
            'tutorSession.tutorMain.preferenceLanguage',
            'tutorSession.tutorMain.preferenceLanguage.preference',
            'tutorSession.tutorMain.preferenceLanguage.preference.teachingStyle',
            'tutorSession.tutorMain.preferenceLanguage.preference.modality',
            'tutorSession.tutorMain.preferenceLanguage.preference.availability',
            'tutorSession.tutorMain.departmentYearSubject.department',
            'tutorSession.tutorMain.departmentYearSubject.subject',
            'tutorSession.tutorMain.departmentYearSubject.gradeLevel',
            'tutorSession.guardianMain.guardian.userProfile',
            'tutorSession.guardianMain.guardian.userProfile.gender',
            'tutorSession.guardianMain.guardian.userProfile.userType',
            'tutorSession.guardianMain.guardian.userProfile.userStatus',
            'tutorSession.guardianMain.guardian.relation',
            'tutorSession.guardianMain.child.gender',
            'tutorSession.guardianMain.child.yearLevel',
            'tutorSession.guardianMain.preferenceLanguage.preference.teachingStyle',
            'tutorSession.guardianMain.preferenceLanguage.preference.modality',
            'tutorSession.guardianMain.preferenceLanguage.preference.availability',
            'tutorSession.guardianMain.preferenceLanguage',
            'tutorSession.bookingAvailability.sessionType',
            'tutorSession.bookingAvailability.day',
            'tutorSession.bookingAvailability.availabilityStart',
            'tutorSession.bookingAvailability.availabilityEnd',
            'tutorSession.transaction.booking.guardianMain.guardian.userProfile',
            'tutorSession.transaction.booking.guardianMain.guardian.userProfile.gender',
            'tutorSession.transaction.booking.guardianMain.guardian.userProfile.userType',
            'tutorSession.transaction.booking.guardianMain.guardian.userProfile.userStatus',
            'tutorSession.transaction.booking.guardianMain.guardian.relation',
            'tutorSession.transaction.booking.guardianMain.child.gender',
            'tutorSession.transaction.booking.guardianMain.child.yearLevel',
            'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.teachingStyle',
            'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.modality',
            'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.availability',
            'tutorSession.transaction.booking.guardianMain.preferenceLanguage',
            'tutorSession.transaction.booking.tutorMain.tutor.userProfile.gender',
            'tutorSession.transaction.booking.tutorMain.tutor.userProfile.userStatus',
            'tutorSession.transaction.booking.tutorMain.tutor.userProfile.userType',
            'tutorSession.transaction.booking.tutorMain.tutor.employmentSession',
            'tutorSession.transaction.booking.tutorMain.tutor.employmentSession.sessionType',
            'tutorSession.transaction.booking.tutorMain.tutor.employmentSession.employmentType',
            'tutorSession.transaction.booking.tutorMain.educationLevel',
            'tutorSession.transaction.booking.tutorMain.requirement',
            'tutorSession.transaction.booking.tutorMain.preferenceLanguage',
            'tutorSession.transaction.booking.tutorMain.preferenceLanguage',
            'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference',
            'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.teachingStyle',
            'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.modality',
            'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.availability',
            'tutorSession.transaction.booking.tutorMain.departmentYearSubject.department',
            'tutorSession.transaction.booking.tutorMain.departmentYearSubject.subject',
            'tutorSession.transaction.booking.tutorMain.departmentYearSubject.gradeLevel',
            'tutorSession.transaction.booking.rate',
            'tutorSession.transaction.booking.rate.yearLevel',
            'tutorSession.transaction.booking.rate.sessionType',
            'tutorSession.transaction.booking.rate.modality',
            'tutorSession.transaction.booking.bookingStatus',
            'tutorSession.transaction.booking.bookingAvailability.sessionType',
            'tutorSession.transaction.booking.bookingAvailability.availabilityStart',
            'tutorSession.transaction.booking.bookingAvailability.availabilityEnd',
            'tutorSession.sessionStatus',
            'subject',
            'assessmentVisibilityStatus',
            'assessmentStatus',
            'assessmentSubmissionGrade.submission',
            'assessmentSubmissionGrade.grade.mark'
        )->whereIn('tutor_sessions_id', $tutorSessionIds)
            ->where('assessment_visibility_status_id', 2)
            ->get();

        //dd($assessment);

        return response()->json([
            'success' => 'Successfully loaded assessments',
            'data' => $assessment
        ]);
    }

    public function displayAssessment(Request $request)
    {
        $assessmentID = $request->input('assessmentID');
        $visibilityID = $request->input('visibilityID');

        if ($visibilityID) {
            $assessment = Assessment::with(
                'tutorSession.tutorMain.tutor.userProfile.gender',
                'tutorSession.tutorMain.tutor.userProfile.userStatus',
                'tutorSession.tutorMain.tutor.userProfile.userType',
                'tutorSession.tutorMain.tutor.employmentSession',
                'tutorSession.tutorMain.tutor.employmentSession.sessionType',
                'tutorSession.tutorMain.tutor.employmentSession.employmentType',
                'tutorSession.tutorMain.educationLevel',
                'tutorSession.tutorMain.requirement',
                'tutorSession.tutorMain.preferenceLanguage',
                'tutorSession.tutorMain.preferenceLanguage',
                'tutorSession.tutorMain.preferenceLanguage.preference',
                'tutorSession.tutorMain.preferenceLanguage.preference.teachingStyle',
                'tutorSession.tutorMain.preferenceLanguage.preference.modality',
                'tutorSession.tutorMain.preferenceLanguage.preference.availability',
                'tutorSession.tutorMain.departmentYearSubject.department',
                'tutorSession.tutorMain.departmentYearSubject.subject',
                'tutorSession.tutorMain.departmentYearSubject.gradeLevel',
                'tutorSession.guardianMain.guardian.userProfile',
                'tutorSession.guardianMain.guardian.userProfile.gender',
                'tutorSession.guardianMain.guardian.userProfile.userType',
                'tutorSession.guardianMain.guardian.userProfile.userStatus',
                'tutorSession.guardianMain.guardian.relation',
                'tutorSession.guardianMain.child.gender',
                'tutorSession.guardianMain.child.yearLevel',
                'tutorSession.guardianMain.preferenceLanguage.preference.teachingStyle',
                'tutorSession.guardianMain.preferenceLanguage.preference.modality',
                'tutorSession.guardianMain.preferenceLanguage.preference.availability',
                'tutorSession.guardianMain.preferenceLanguage',
                'tutorSession.bookingAvailability.sessionType',
                'tutorSession.bookingAvailability.day',
                'tutorSession.bookingAvailability.availabilityStart',
                'tutorSession.bookingAvailability.availabilityEnd',
                'tutorSession.transaction.booking.guardianMain.guardian.userProfile',
                'tutorSession.transaction.booking.guardianMain.guardian.userProfile.gender',
                'tutorSession.transaction.booking.guardianMain.guardian.userProfile.userType',
                'tutorSession.transaction.booking.guardianMain.guardian.userProfile.userStatus',
                'tutorSession.transaction.booking.guardianMain.guardian.relation',
                'tutorSession.transaction.booking.guardianMain.child.gender',
                'tutorSession.transaction.booking.guardianMain.child.yearLevel',
                'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.teachingStyle',
                'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.modality',
                'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.availability',
                'tutorSession.transaction.booking.guardianMain.preferenceLanguage',
                'tutorSession.transaction.booking.tutorMain.tutor.userProfile.gender',
                'tutorSession.transaction.booking.tutorMain.tutor.userProfile.userStatus',
                'tutorSession.transaction.booking.tutorMain.tutor.userProfile.userType',
                'tutorSession.transaction.booking.tutorMain.tutor.employmentSession',
                'tutorSession.transaction.booking.tutorMain.tutor.employmentSession.sessionType',
                'tutorSession.transaction.booking.tutorMain.tutor.employmentSession.employmentType',
                'tutorSession.transaction.booking.tutorMain.educationLevel',
                'tutorSession.transaction.booking.tutorMain.requirement',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.teachingStyle',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.modality',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.availability',
                'tutorSession.transaction.booking.tutorMain.departmentYearSubject.department',
                'tutorSession.transaction.booking.tutorMain.departmentYearSubject.subject',
                'tutorSession.transaction.booking.tutorMain.departmentYearSubject.gradeLevel',
                'tutorSession.transaction.booking.rate',
                'tutorSession.transaction.booking.rate.yearLevel',
                'tutorSession.transaction.booking.rate.sessionType',
                'tutorSession.transaction.booking.rate.modality',
                'tutorSession.transaction.booking.bookingStatus',
                'tutorSession.transaction.booking.bookingAvailability.sessionType',
                'tutorSession.transaction.booking.bookingAvailability.day',
                'tutorSession.transaction.booking.bookingAvailability.availabilityStart',
                'tutorSession.transaction.booking.bookingAvailability.availabilityEnd',
                'tutorSession.sessionStatus',
                'subject',
                'assessmentVisibilityStatus',
                'assessmentStatus',
                'assessmentSubmissionGrade.submission',
                'assessmentSubmissionGrade.grade.mark'
            )
                ->where('id', $assessmentID)->where('assessment_visibility_status_id', 1)->first();
        } else {
            $assessment = Assessment::with(
                'tutorSession.tutorMain.tutor.userProfile.gender',
                'tutorSession.tutorMain.tutor.userProfile.userStatus',
                'tutorSession.tutorMain.tutor.userProfile.userType',
                'tutorSession.tutorMain.tutor.employmentSession',
                'tutorSession.tutorMain.tutor.employmentSession.sessionType',
                'tutorSession.tutorMain.tutor.employmentSession.employmentType',
                'tutorSession.tutorMain.educationLevel',
                'tutorSession.tutorMain.requirement',
                'tutorSession.tutorMain.preferenceLanguage',
                'tutorSession.tutorMain.preferenceLanguage',
                'tutorSession.tutorMain.preferenceLanguage.preference',
                'tutorSession.tutorMain.preferenceLanguage.preference.teachingStyle',
                'tutorSession.tutorMain.preferenceLanguage.preference.modality',
                'tutorSession.tutorMain.preferenceLanguage.preference.availability',
                'tutorSession.tutorMain.departmentYearSubject.department',
                'tutorSession.tutorMain.departmentYearSubject.subject',
                'tutorSession.tutorMain.departmentYearSubject.gradeLevel',
                'tutorSession.guardianMain.guardian.userProfile',
                'tutorSession.guardianMain.guardian.userProfile.gender',
                'tutorSession.guardianMain.guardian.userProfile.userType',
                'tutorSession.guardianMain.guardian.userProfile.userStatus',
                'tutorSession.guardianMain.guardian.relation',
                'tutorSession.guardianMain.child.gender',
                'tutorSession.guardianMain.child.yearLevel',
                'tutorSession.guardianMain.preferenceLanguage.preference.teachingStyle',
                'tutorSession.guardianMain.preferenceLanguage.preference.modality',
                'tutorSession.guardianMain.preferenceLanguage.preference.availability',
                'tutorSession.guardianMain.preferenceLanguage',
                'tutorSession.bookingAvailability.sessionType',
                'tutorSession.bookingAvailability.day',
                'tutorSession.bookingAvailability.availabilityStart',
                'tutorSession.bookingAvailability.availabilityEnd',
                'tutorSession.transaction.booking.guardianMain.guardian.userProfile',
                'tutorSession.transaction.booking.guardianMain.guardian.userProfile.gender',
                'tutorSession.transaction.booking.guardianMain.guardian.userProfile.userType',
                'tutorSession.transaction.booking.guardianMain.guardian.userProfile.userStatus',
                'tutorSession.transaction.booking.guardianMain.guardian.relation',
                'tutorSession.transaction.booking.guardianMain.child.gender',
                'tutorSession.transaction.booking.guardianMain.child.yearLevel',
                'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.teachingStyle',
                'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.modality',
                'tutorSession.transaction.booking.guardianMain.preferenceLanguage.preference.availability',
                'tutorSession.transaction.booking.guardianMain.preferenceLanguage',
                'tutorSession.transaction.booking.tutorMain.tutor.userProfile.gender',
                'tutorSession.transaction.booking.tutorMain.tutor.userProfile.userStatus',
                'tutorSession.transaction.booking.tutorMain.tutor.userProfile.userType',
                'tutorSession.transaction.booking.tutorMain.tutor.employmentSession',
                'tutorSession.transaction.booking.tutorMain.tutor.employmentSession.sessionType',
                'tutorSession.transaction.booking.tutorMain.tutor.employmentSession.employmentType',
                'tutorSession.transaction.booking.tutorMain.educationLevel',
                'tutorSession.transaction.booking.tutorMain.requirement',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.teachingStyle',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.modality',
                'tutorSession.transaction.booking.tutorMain.preferenceLanguage.preference.availability',
                'tutorSession.transaction.booking.tutorMain.departmentYearSubject.department',
                'tutorSession.transaction.booking.tutorMain.departmentYearSubject.subject',
                'tutorSession.transaction.booking.tutorMain.departmentYearSubject.gradeLevel',
                'tutorSession.transaction.booking.rate',
                'tutorSession.transaction.booking.rate.yearLevel',
                'tutorSession.transaction.booking.rate.sessionType',
                'tutorSession.transaction.booking.rate.modality',
                'tutorSession.transaction.booking.bookingStatus',
                'tutorSession.transaction.booking.bookingAvailability.sessionType',
                'tutorSession.transaction.booking.bookingAvailability.day',
                'tutorSession.transaction.booking.bookingAvailability.availabilityStart',
                'tutorSession.transaction.booking.bookingAvailability.availabilityEnd',
                'tutorSession.sessionStatus',
                'subject',
                'assessmentVisibilityStatus',
                'assessmentStatus',
                'assessmentSubmissionGrade.submission',
                'assessmentSubmissionGrade.grade.mark'
            )
                ->where('id', $assessmentID)->where('assessment_visibility_status_id', 2)->first();
        }
        return response()->json([
            'success' => 'Successfully fetched assessments',
            'data' => $assessment
        ]);
    }
    public function loadHiddenAssessment(Request $request)
    {

        $childId = $request->input('childId');
        //$childId = 28;


        $ClientMainId = Session('clientMain')->guardian->id;
        $LoggedUserId = session('loginId');

        $guardianIds = GuardianMain::where('guardian_id', $ClientMainId)
            ->where('child_id', $childId)->get()->pluck('id');

        if (!$guardianIds) {
            return response()->json(['error' => true, 'message' => 'No guardians']);
        }


        $tutorSessionIds = TutorSession::where('guardian_main_id', $guardianIds)->get()->pluck('id');

        if (!$tutorSessionIds) {
            return response()->json(['error' => true, 'message' => 'No tutorsessions']);
        }

        $assessment = Assessment::with([
            'tutorSession.tutorMain.tutor.userProfile.gender',
            'tutorSession.tutorMain.tutor.userProfile.userStatus',
            'tutorSession.tutorMain.tutor.userProfile.userType',
            'tutorSession.tutorMain.tutor.employmentSession.sessionType',
            'tutorSession.tutorMain.tutor.employmentSession.employmentType',
            'tutorSession.tutorMain.educationLevel',
            'tutorSession.tutorMain.requirement',
            'tutorSession.tutorMain.preferenceLanguage.preference.teachingStyle',
            'tutorSession.tutorMain.preferenceLanguage.preference.modality',
            'tutorSession.tutorMain.departmentYearSubject.department',
            'tutorSession.tutorMain.departmentYearSubject.subject',
            'tutorSession.tutorMain.departmentYearSubject.gradeLevel',
            'tutorSession.guardianMain.guardian.userProfile.gender',
            'tutorSession.guardianMain.guardian.userProfile.userType',
            'tutorSession.guardianMain.guardian.relation',
            'tutorSession.guardianMain.child.gender',
            'tutorSession.guardianMain.child.yearLevel',
            'tutorSession.guardianMain.preferenceLanguage.preference.teachingStyle',
            'tutorSession.guardianMain.preferenceLanguage.preference.modality',
            'tutorSession.transaction.booking.guardianMain.guardian.userProfile.gender',
            'tutorSession.transaction.booking.guardianMain.guardian.relation',
            'tutorSession.transaction.booking.tutorMain.tutor.userProfile.gender',
            'tutorSession.transaction.booking.tutorMain.tutor.employmentSession.sessionType',
            'tutorSession.transaction.booking.tutorMain.departmentYearSubject.department',
            'tutorSession.transaction.booking.rate.sessionType',
            'tutorSession.sessionStatus',
            'subject',
            'assessmentVisibilityStatus',
            'assessmentStatus',
            'assessmentSubmissionGrade.submission',
            'assessmentSubmissionGrade.grade', // This will load grade even if it's null
            'assessmentSubmissionGrade.grade.mark'
        ])
            ->whereIn('tutor_sessions_id', $tutorSessionIds)
            ->where('assessment_visibility_status_id', 1)
            ->get();

        // Now handle missing grade data in your logic
        $assessment->each(function ($item) {
            // Check if `assessmentSubmissionGrade` exists
            if ($item->assessmentSubmissionGrade) {
                $item->assessmentSubmissionGrade->each(function ($submissionGrade) {
                    // Check if `grade` exists
                    if ($submissionGrade->grade) {
                        // Handle the grade with a grade_status_id of 1
                        if ($submissionGrade->grade->grade_status_id == 1) {
                            // Do something with the grade if needed
                        }
                    } else {
                        // Handle the case when `grade` is null (if needed)
                    }
                });
            } else {
                // Handle the case when `assessmentSubmissionGrade` is null (if needed)
            }
        });

        // Return the assessment data as JSON
        return response()->json($assessment);
    }

    public function hideAssessment(Request $request)
    {
        $assessmentID = $request->input('hideID');

        $assessment = Assessment::find($assessmentID);

        if (!$assessment) {
            return response()->json(['error' => 'Assessment not found.', 404]);
        }

        if ($assessment->assessment_visibility_status_id == 2) {
            $assessment->assessment_visibility_status_id = 1;
            $assessment->save();
            return response()->json(['success' => 'Assessment hidden']);
        } else {
            return response()->json(['error' => 'Assessment already hidden']);
        }
    }

    //get the id of student in session
    public function submitAssessment(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'submission' => 'required|file|mimes:pdf',
                'assessmentID' => 'required|int',
                'childID' => 'required|int',
                'tutorID' => 'required|int',
            ]);

            $senderId = session('loginId');
            $receiverId = $request->input('tutorID');
            $childId = $request->input('childID');
            $assessmentID = $request->input('assessmentID');
            $currentdatetime = now(); // Get current date and time
    
            $user = UserProfile::find($senderId);
            $username = "$user->fname $user->lname";

            $child = Children::find($childId);
            $childName = "$child->fname $child->lname";

            $assessment = Assessment::find($assessmentID);

            // Ensure that the assessment exists and get its deadline
            if (!$assessment) {
                return response()->json(['error' => 'Assessment does not exist.']);
            }

            $deadline = Carbon::parse($assessment->deadline)->setTimezone(config('app.timezone'));

            // Log or debug for verification
            Log::info('Current datetime (Asia/Manila): ' . $currentdatetime);
            Log::info('Deadline (Asia/Manila): ' . $deadline);
            
             $submission_status_id = null;
            if (!$request->hasFile('submission')) {
                // No submission was made
                $submission_status_id = 2;
                $assessment_status_id = 2;
            } elseif ($currentdatetime->greaterThan($deadline)) {
                // Submission was made after the deadline
                $submission_status_id = 3;
                $assessment_status_id = 3;
            } else {
                // Submission was made on time
                $submission_status_id = 1;
                $assessment_status_id = 1;
            }
            
            /*dd([
                'carbon now' => now(),
                'parsed current time:'=> $currentdatetime,
                'parsed deadline' => $deadline,
                'submission status' => $submission_status_id
                ]);*/

            $assessmentSubmissionGrade = AssessmentSubmissionGrade::where('assessment_id', $assessmentID)->first();

            if ($assessmentSubmissionGrade) {
                $submissionId = $assessmentSubmissionGrade->submission_id;
                $gradeId = $assessmentSubmissionGrade->grade_id;

                $grade = Grade::find($gradeId);
                $gradeStatus = $grade->grade_status_id;

                if ($submissionId) {
                    if ($gradeStatus == 2) {
                        if ($assessment->attempts >= 1) {

                            DB::beginTransaction();

                            $submission = Submission::find($submissionId);

                            if ($request->has('submission')) {
                                $file = $request->file('submission');
                                $extension = $file->getClientOriginalExtension();
                                $filename = time() . '.' . $extension;
                                $path = 'Submissions/';
                                if (!$file->isValid()) {
                                    return response()->json(['error' => 'Invalid file']);
                                }
                                $file->move($path, $filename);
                                $submission->submission = $path . $filename;
                                $submission->submission_status_id = $submission_status_id;
                                $submission->save();
                            }
                            $assessment->attempts -= 1;
                            $assessment->assessment_status_id = $assessment_status_id;
                            $assessment->save();

                            DB::commit();
                            return response()->json(['success' => 'Attempt submitted successfully.',]);
                        } else {
                            return response()->json(['error' => 'Max attempts reached.']);
                        }
                    } else {
                        return response()->json(['error' => 'Assessment has already been graded.']);
                    }
                } else {

                    DB::beginTransaction();

                    $submission = new Submission;
                    $submission->submitted_on = now();
                    $submission->submission_status_id = $submission_status_id;

                    if ($request->has('submission')) {
                        $file = $request->file('submission');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $path = 'Submissions/';
                        if (!$file->isValid()) {
                            return response()->json(['error' => 'Invalid file']);
                        }
                        $file->move($path, $filename);
                        $submission->submission = $path . $filename;
                        $submission->save();
                    }
                    $newSubmissionId = $submission->id;

                    $assessmentSubmissionGrade->submission_id = $newSubmissionId;
                    $assessmentSubmissionGrade->save();

                    $assessment->attempts -= 1;
                    $assessment->assessment_status_id = $assessment_status_id;
                    $assessment->save();

                    $Notif = new Notification();
                    $Notif->user_id = $receiverId;
                    $Notif->title = "A student submitted an attempt for an assessment";
                    $Notif->author = $username;
                    $Notif->content = "Student $childName has submitted an attempt for your assessment";
                    $Notif->notification_type = 1;
                    $Notif->user_type = 2;
                    $Notif->seen = 0;
                    $Notif->booking_id = 0;
                    $Notif->tutoring_session_id = 0;
                    $Notif->created_at = now()->setTimezone(config('app.timezone'));
                    $Notif->save();

                    DB::commit();

                    event(new UserNotification([
                        'user_id' => $receiverId,
                        'user_type' => '',
                        'author' => $Notif->author,
                        'title' => $Notif->title,
                        'content' => $Notif->content,
                        'time' => $Notif->created_at,
                        'type' => $Notif->notification_type
                    ]));

                    return response()->json(['success' => 'Attempt submitted successfully.']);
                }
            } else {
                return response()->json(['error' => 'Assessment not found', 404]);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (Throwable $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }
}
