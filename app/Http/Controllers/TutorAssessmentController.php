<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Assessment;
use App\Models\AssessmentStatus;
use App\Models\AssessmentSubmissionGrade;
use App\Models\AssessmentVisibilityStatus;
use App\Models\Children;
use App\Models\Grade;
use App\Models\gradeStatus;
use App\Models\Mark;
use App\Models\Notification;
use App\Models\Subject;
use App\Models\Submission;
use App\Models\SubmissionStatus;
use App\Models\TutorSession;
use App\Models\UserProfile;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Assert;


class TutorAssessmentController extends Controller
{


    public function index()
    {
        $assessmentVisibility = AssessmentVisibilityStatus::all();
        $submitStatus = SubmissionStatus::all();
        $gradeStatus = gradeStatus::all();
        $mark = Mark::all();

        return view('tutor.tutorassessment', compact('assessmentVisibility', 'submitStatus', 'gradeStatus', 'mark'));
    }

    public function loadAssessments()
    {
        $tutorMainId = session('tutorMain')->id;

        $students = TutorSession::with(
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
            //'booking.bookingAvailability.sessionType',
            //'booking.bookingAvailability.day',
            //'booking.bookingAvailability.availabilityStart',
            //'booking.bookingAvailability.availabilityEnd',
            //'transaction.booking.guardianMain.guardian.userProfile',
            //'transaction.booking.guardianMain.guardian.userProfile.gender',
            //'transaction.booking.guardianMain.guardian.userProfile.userType',
            //'transaction.booking.guardianMain.guardian.userProfile.userStatus',
            //'transaction.booking.guardianMain.guardian.relation',
            //'transaction.booking.guardianMain.child.gender',
            //'transaction.booking.guardianMain.child.yearLevel',
            //'transaction.booking.guardianMain.preferenceLanguage.preference.teachingStyle',
            //'transaction.booking.guardianMain.preferenceLanguage.preference.modality',
            //'transaction.booking.guardianMain.preferenceLanguage.preference.availability',
            //'transaction.booking.guardianMain.preferenceLanguage',

            //'transaction.booking.tutorMain.tutor.userProfile.gender',
            //'transaction.booking.tutorMain.tutor.userProfile.userStatus',
            //'transaction.booking.tutorMain.tutor.userProfile.userType',
            //'transaction.booking.tutorMain.tutor.employmentSession',
            //'transaction.booking.tutorMain.tutor.employmentSession.sessionType',
            //'transaction.booking.tutorMain.tutor.employmentSession.employmentType',
            //'transaction.booking.tutorMain.educationLevel',
            //'transaction.booking.tutorMain.requirement',
            //'transaction.booking.tutorMain.preferenceLanguage',
            //'transaction.booking.tutorMain.preferenceLanguage',
            //'transaction.booking.tutorMain.preferenceLanguage.preference',
            //'transaction.booking.tutorMain.preferenceLanguage.preference.teachingStyle',
            //'transaction.booking.tutorMain.preferenceLanguage.preference.modality',
            //'transaction.booking.tutorMain.preferenceLanguage.preference.availability',
            //'transaction.booking.tutorMain.departmentYearSubject.department',
            //'transaction.booking.tutorMain.departmentYearSubject.subject',
            //'transaction.booking.tutorMain.departmentYearSubject.gradeLevel',
            //'transaction.booking.rate',
            //'transaction.booking.rate.yearLevel',
            //'transaction.booking.rate.sessionType',
            //'transaction.booking.rate.modality',
            //'transaction.booking.bookingStatus',
            //'transaction.booking.bookingAvailability.sessionType',
            //'transaction.booking.bookingAvailability.day',
            //'transaction.booking.bookingAvailability.availabilityStart',
            //'transaction.booking.bookingAvailability.availabilityEnd',
            'sessionStatus'
        )
            ->where('tutor_main_id', $tutorMainId)
            ->where('session_status_id', 1)->get();
        //dd($students);

        return response()->json($students);
    }

    public function searchAssessments(Request $request)
    {
        $searchQuery = $request->input('query');
        $tutorMainId = session('tutorMain')->id;

        $search = TutorSession::with(
            'tutorMain.tutor.userProfile.gender',
            'tutorMain.tutor.userProfile.userStatus',
            'tutorMain.tutor.userProfile.userType',
            'tutorMain.tutor.employmentSession',
            'tutorMain.tutor.employmentSession.sessionType',
            'tutorMain.tutor.employmentSession.employmentType',
            'tutorMain.educationLevel',
            'tutorMain.requirement',
            'tutorMain.preferenceLanguage',
            'tutorMain.departmentYearSubject.department',
            'tutorMain.departmentYearSubject.subject',
            'tutorMain.departmentYearSubject.gradeLevel',
            'guardianMain.guardian.userProfile',
            'guardianMain.child',
            'transaction.booking',
            'sessionStatus'
        )
            ->where('tutor_main_id', $tutorMainId)
            ->where(function ($query) use ($searchQuery) {
                // Search by child's first or last name or their full name
                $query->whereHas('guardianMain.child', function ($q) use ($searchQuery) {
                    $q->where('fname', 'LIKE', "%{$searchQuery}%")
                        ->orWhere('lname', 'LIKE', "%{$searchQuery}%")
                        ->orWhere(DB::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$searchQuery}%");
                })
                    // Search by guardian's first or last name or their full name
                    ->orWhereHas('guardianMain.guardian.userProfile', function ($q) use ($searchQuery) {
                        $q->where('fname', 'LIKE', "%{$searchQuery}%")
                            ->orWhere('lname', 'LIKE', "%{$searchQuery}%")
                            ->orWhere(DB::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$searchQuery}%");
                    });
            })
            ->get();

        return response()->json($search);
    }

    public function viewAssessments(Request $request)
    {
        $tutorSessionID = $request->input('tutorSessionID');
        //dd($child_id);
        $result = Assessment::with(
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
            'assessmentSubmissionGrade.grade.mark',
            'assessmentSubmissionGrade.grade.gradeStatus'
        )
            /*->whereHas('tutorSession.guardianMain.child', function ($query) use ($child_id) {
                $query->where('id', $child_id);
            })*/
            ->where('tutor_sessions_id', $tutorSessionID)
            ->orderBy('deadline', 'ASC')
            ->get();
        return response()->json($result);
    }

    public function createAssessment(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'deadline' => 'required|date|after:today',
                'rubrics' => 'required|file|mimes:pdf',
                'module' => 'nullable|file|mimes:pdf',
                'visibility' => 'required',
                'tutor_session_id' => 'required|int',
                'child_id' => 'required|int',
                'guardian_id' => 'required|int'
            ]);

            $tutor = session('tutorMain')->id;
            $senderId = session('loginId');
            $subjectID = session('tutorMain')->departmentYearSubject->subject->id;
            $title = $request->input('title');
            $description = $request->input('description');
            $deadline = Carbon::parse($request->input('deadline'))->setTimezone(config('app.timezone'));
            $visibility = $request->input('visibility');
            $tutorSessionId = $request->input('tutor_session_id');
            $childId = $request->input('child_id');
            $receiverId = $request->input('guardian_id');

            //dd(Session::all(),$request->all());

            $user = UserProfile::find($senderId);
            $username = "$user->fname $user->lname";



            $child = Children::find($childId);
            $childName = "$child->fname $child->lname";

            // Fetch tutor session
            $tutorSession = TutorSession::where('id', $tutorSessionId)
                ->where('tutor_main_id', $tutor)
                ->first();

            //dd($tutorSession);
            if (!$tutorSession) {
                return response()->json(['error' => true, 'message' => 'Tutoring Session does not exist.'], 404);
            }

            DB::beginTransaction();

            // Create a new assessment
            $assessment = new Assessment();
            $assessment->title = $title;
            $assessment->description = $description;
            $assessment->deadline = $deadline;
            $assessment->tutor_sessions_id = $tutorSessionId;
            $assessment->subject_id = $subjectID;
            $assessment->assessment_visibility_status_id = $visibility;
            $assessment->assessment_status_id = 2; // Default status
            $assessment->attempts = 2;

            // Handle file upload for rubrics
            if ($request->hasFile('rubrics')) {
                $rubricfile = $request->file('rubrics');
                $rubricfilename = time() . '.' . $rubricfile->getClientOriginalExtension();
                $rubricpath = 'rubrics/';
                $rubricfile->move($rubricpath, $rubricfilename);
                $assessment->rubrics = $rubricpath . $rubricfilename;
            }

            if ($request->hasFile('module')) {
                $modulefile = $request->file('module');
                $filename = time() . '.' . $modulefile->getClientOriginalExtension();
                $modulepath = 'modules/';
                $modulefile->move($modulepath, $filename);
                $assessment->module = $modulepath . $filename;
            } else {
                $assessment->module = '';
            }

            $assessment->save();

            $newAssessmentId = $assessment->id;

            if ($newAssessmentId) {

                // Create the grade associated with this assessment
                $grade = new Grade();
                $grade->mark_id = 0;
                $grade->feedback = '';
                $grade->grade_status_id = 2; // Default ungraded
                $grade->save();
            }
            $newGradeId = $grade->id;

            if ($newAssessmentId && $newGradeId) {
                // Link the assessment with grade via AssessmentSubmissionGrade
                $assessmentSubmissionGrade = new AssessmentSubmissionGrade();
                $assessmentSubmissionGrade->submission_id = null;
                $assessmentSubmissionGrade->assessment_id = $newAssessmentId;
                $assessmentSubmissionGrade->grade_id = $newGradeId;
                $assessmentSubmissionGrade->save();
            }

            $Notif = new Notification();
            $Notif->user_id = $receiverId;
            $Notif->title = "A tutor has posted a new assessment";
            $Notif->author = $username;
            $Notif->content = "Tutor $username has posted an assessment for $childName";
            $Notif->notification_type = 1;
            $Notif->user_type = 1;
            $Notif->seen = 0;
            $Notif->booking_id = 0;
            $Notif->tutoring_session_id = 0;
            $Notif->created_at = now()->setTimezone(config('app.timezone'));
            $Notif->save();

            DB::commit();

            //send notification
            event(new UserNotification([
                'user_id' => $receiverId,
                'user_type'=>'',
                'author' => $Notif->author,
                'title' => $Notif->title,
                'content' => $Notif->content,
                'time' => $Notif->created_at,
                'type' => $Notif->notification_type
            ]));

            return response()->json(['success' => true, 'message' => 'Assessment created successfully']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Catch validation errors
            return response()->json([
                'error' => true,
                'message' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Catch any other errors
            DB::rollback(); // Rollback the transaction if any error occurs
            return response()->json([
                'error' => true,
                'message' => 'Failed to create assessment',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteAssessment(Request $request)
    {
        $assessmentId = $request->input('deleteAssessmentID');

        $Assessment = Assessment::find($assessmentId);

        if (!$Assessment) {
            return response()->json(['error' => true, 'message' => 'Assessment not found.']);
        }

        $AssessmentSubmissionGrade = AssessmentSubmissionGrade::where('assessment_id', $assessmentId)->first();

        if ($AssessmentSubmissionGrade &&  $AssessmentSubmissionGrade->submission_id) {
            return response()->json(['error' => true, 'message' => 'Cannot delete assessment, a submission already exists.']);
        }

        $gradeId = $AssessmentSubmissionGrade->grade_id;
        $grade = Grade::find($gradeId);

        try {
            DB::beginTransaction();

            $Assessment->delete();
            $grade->delete();
            $AssessmentSubmissionGrade->delete();

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Assessment successfully deleted.']);
        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'error' => true,
                'message' => 'Failed to delete assessment.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function loadEditAssessment(Request $request)
    {
        $tutorSessionID = $request->input('tutorSessionID');
        $result = Assessment::with(
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
            'tutorSession.sessionStatus',
            'subject',
            'assessmentVisibilityStatus',
            'assessmentStatus',
            'assessmentSubmissionGrade.submission',
            'assessmentSubmissionGrade.grade.mark',
            'assessmentSubmissionGrade.grade.gradeStatus'
        )
            ->where('id', $tutorSessionID)
            ->first();

        return response()->json($result);
    }

    public function editAssessment(Request $request)
    {
        try {

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'deadline' => 'required|date|after:today',
                'rubrics' => 'nullable|file|mimes:pdf',
                'module' => 'nullable|file|mimes:pdf',
                'visibility' => 'required',
                'tutor_session_id' => 'required|int',
            ]);

            $title = $request->input('title');
            $description = $request->input('description');
            $deadline = Carbon::parse($request->input('deadline'))->setTimezone(config('app.timezone'));
            $visibility = $request->input('visibility');
            $tutorSessionId = $request->input('tutor_session_id');

            $assessment = Assessment::find($tutorSessionId);

            if (!$assessment) {
                return response()->json(['error' => true, 'message' => 'Assessment not found'], 404);
            }

            $submission = AssessmentSubmissionGrade::where('assessment_id', $tutorSessionId)->first();

            $submissionId = $submission->submission_id;

            if (!$submissionId) {

                DB::beginTransaction();

                $assessment->title = $title;
                $assessment->description = $description;
                $assessment->deadline = $deadline;
                $assessment->assessment_visibility_status_id = $visibility;

                if ($request->hasFile('rubrics')) {
                    $rubricsfile = $request->file('rubrics');
                    $rubricsfilename = time() . '.' . $rubricsfile->getClientOriginalExtension();
                    $rubricspath = 'rubrics/';
                    $rubricsfile->move($rubricspath, $rubricsfilename);
                    $assessment->rubrics = $rubricspath . $rubricsfilename;
                }
                if ($request->hasFile('module')) {
                    $modulefile = $request->file('module');
                    $modulefilename = time() . '.' . $modulefile->getClientOriginalExtension();
                    $modulepath = 'modules/';
                    $modulefile->move($modulepath, $modulefilename);
                    $assessment->module = $modulepath . $modulefilename;
                } else {
                    $assessment->module = '';
                }
                $assessment->save();

                DB::commit();

                return response()->json(['success' => true, 'message' => 'Assessment updated successfully.']);
            } else {
                return response()->json(['error' => true, 'message' => 'Cannot update assessment, a submission already exists.']);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Catch validation errors
            return response()->json([
                'error' => true,
                'message' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Catch any other errors
            DB::rollback(); // Rollback the transaction if any error occurs
            return response()->json([
                'error' => true,
                'message' => 'Failed to edit assessment',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function gradeAssessment(Request $request)
    {
        try {
            $request->validate([
                'assessment_id' => 'required|int',
                'submission_grade' => 'required|int',
                'guardian_id' => 'required|int',
                'child_id' => 'required|int',
            ]);

            $senderId = session('loginId');
            $evaluationGrade = $request->input('submission_grade');
            $assessmentId = $request->input('assessment_id');
            $receiverId = $request->input('guardian_id');
            $childId = $request->input('child_id');

            $user = UserProfile::find($senderId);
            $username = "$user->fname $user->lname";

            $child = Children::find($childId);
            $childName = "$child->fname $child->lname";

            if ($evaluationGrade == 0) {
                return response()->json(['error' => true, 'message' => 'Grade cannot be zero.'], 422);
            }

            $assessment = Assessment::find($assessmentId);

            if (!$assessment) {
                return response()->json(['error' => true, 'message' => 'Assessment not found.'], 404);
            }

            $AssessmentSubmissionGrade = AssessmentSubmissionGrade::where('assessment_id', $assessmentId)->first();

            if (!$AssessmentSubmissionGrade) {
                return response()->json(['error' => true, 'message' => 'Assessment submission grade not found.'], 404);
            }

            $submissionId = $AssessmentSubmissionGrade->submission_id;
            if (!$submissionId) {
                return response()->json(['error' => true, 'message' => 'Cannot grade assessment, no submission was made.']);
            }

            $gradeId = $AssessmentSubmissionGrade->grade_id;
            $grade = Grade::find($gradeId);

            if ($grade && $grade->grade_status_id == 1) {

                DB::beginTransaction();
                $grade->mark_id = $evaluationGrade;
                $grade->save();
                DB::commit();

                return response()->json(['success' => true, 'message' => 'Updated assessment grade successfully.']);
            } else if ($grade && $grade->grade_status_id == 2) {

                DB::beginTransaction();

                $grade->mark_id = $evaluationGrade;
                $grade->grade_status_id = 1;
                $grade->save();

                $Notif = new Notification();
                $Notif->user_id = $receiverId;
                $Notif->title = "A tutor has graded an assessment";
                $Notif->author = $username;
                $Notif->content = "Tutor $username has graded an assessment for $childName";
                $Notif->notification_type = 1;
                $Notif->user_type = 1;
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

                return response()->json(['success' => true, 'message' => 'Assessment graded successfully.']);
            } else {
                return response()->json(['error' => true, 'message' => 'Cannot grade assessment.']);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollback();  // Rollback transaction if any error occurs
            return response()->json([
                'error' => true,
                'message' => 'Failed to grade assessment',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
