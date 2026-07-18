<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Credential;
use App\Models\Day;
use App\Models\DayAvailability;
use App\Models\DayAvailabilitySessionFinal;
use App\Models\DayAvailabilitySessionType;
use App\Models\Department;
use App\Models\Language;
use App\Models\Modality;
use App\Models\PreferenceLanguage;
use App\Models\SessionTypes;
use App\Models\Subject;
use App\Models\TeachingStyle;
use App\Models\TutorMain;
use App\Models\UserProfile;
use App\Models\YearLevel;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

class TutorProfileController extends Controller
{
    public function index(Request $request)
    {
        //dd(session::all());
        $department = Department::get()->all();

        $subject = Subject::get()->all();

        $yearLevel = YearLevel::get()->all();

        $modality = Modality::get()->all();

        $teachingStyle = TeachingStyle::get()->all();

        $language = Language::get()->all();

        $sessionType = SessionTypes::get()->all();

        $day = Day::get()->all();

        $availability = Availability::get()->all();

        $userId = session('user_profiles')->id;

        $tutorId = session('tutorMain')->tutor->id;

        $profile = UserProfile::where('id', $userId)->get('profile_pic');

        $tutorMain = TutorMain::with(
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
            ->where('tutor_id', $tutorId)
            ->get()
            ->unique('tutor_id');

        //dd($credentials);

        return view('tutor.tutorprofile', compact('profile', 'department', 'subject', 'yearLevel', 'modality', 'teachingStyle', 'language', 'sessionType', 'day', 'availability', 'tutorMain'));
    }

    public function editProfile(Request $request)
    {
        //editing profile picture
        $request->validate([
            'profilePic' => 'nullable|image|mimes:jpeg,png,jpg', // Adjust max file size as needed
        ]);


        $userId = session('tutorMain')->tutor->userProfile->id;


        //dd($userId);
        //dd($userId);
        if ($request->has('profilePic')) {

            $file = $request->file('profilePic');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;
            $path = 'Images/';
            $file->move($path, $filename);

            $profilePic = ['profile_pic' => $path . $filename];


            UserProfile::where('id', $userId)->update($profilePic);


            return redirect()->back()->with('success', 'Profile picture updated successfully!');
        }

        return redirect()->back()->with('error', 'No profile picture uploaded.');
    }

    public function updateTutorPreference(Request $request)
    {
        //dd($request->all());
        $id = $request->input('preference_id');

        DB::beginTransaction();

        $tutorPreference = PreferenceLanguage::findOrFail($id);

        //dd($studentPreference); 
        $validatedData = $request->validate([
            'modality' => 'required',
            'learning_style' => 'required',
            'languages' => 'required|array',
        ]);


        // Update modality
        $modalityId = $request->input('modality');


        $tutorPreference->preference->each(function ($preference) use ($modalityId) {
            $preference->fill([
                'modality_id' => $modalityId,
            ]);
            $preference->save();
        });



        // Update learning style
        $learningStyleId = $request->input('learning_style');
        $tutorPreference->preference->each(function ($preference) use ($learningStyleId) {
            $preference->fill([
                'teaching_style_id' => $learningStyleId,
            ]);
            $preference->save();
        });

        $tutorPreference->languages = implode(',', $validatedData['languages']);
        $tutorPreference->save();


        DB::commit();

        return redirect()->back()->with('success', 'Student preferences updated successfully.');
    }

    //credential
    public function loadCredential()
    {
        $tutorMainId = session('tutorMain')->id;

        $credentials = Credential::where('tutor_main_id', $tutorMainId)->orderBy('year', 'desc')->get();

        return response()->json($credentials);
    }

    public function addCredential(Request $request)
    {
        $tutorMainId = session('tutorMain')->id;

        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'credentialName' => 'required|string',
                'credentialYear' => 'required|integer',
                'credentialFile' => 'required|file|mimes:pdf|max:2048',
            ]);

            $tutorMain = TutorMain::where('id', $tutorMainId)->first();



            $credential = new Credential();
            $credential->tutor_main_id = $tutorMain->id;
            $credential->name = $validatedData['credentialName'];
            $credential->year = $validatedData['credentialYear'];

            $file = $request->file('credentialFile');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'Credentials/';
            $file->move($path, $filename);
            $credential->uploaded_credential = $path . $filename;

            $credential->save();

            DB::commit();

            //dd($credentials);

            return $credential;
        } catch (Exception $e) {
            //dd($e);
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteCredential(Request $request)
    {
        $credentialId = $request->input('credentialId');

        $credential = Credential::find($credentialId);

        //dd($credential);
        $credential->delete();

        return response()->json(['message' => 'Successfully deleted credential']);
    }
    //
    //availability
    public function loadAvailability()
    {
        $tutorMainId = session('tutorMain')->id;

        $availability = DayAvailabilitySessionFinal::with(
            'day',
            'availabilityStart',
            'availabilityEnd',
        )
            ->where('tutor_main_id', $tutorMainId)
            ->orderBy('day_id','ASC')
            ->orderBy('availability_start_id','ASC')
            ->get();

        return response()->json($availability);
    }

    public function deleteAvailability(Request $request)
    {
        $availabilityId = $request->input('availabilityId');

        $availability = DayAvailabilitySessionFinal::find($availabilityId);

        //dd($availability);
        $availability->delete();



        return response()->json(['message' => 'Successfully deleted availability']);
    }


    public function addDayTime(Request $request)
    {
        function convertTimeToMinutes($time)
        {
            // Assumes the time is in 'h:i A' format (e.g., 8:00 AM)
            $time = Carbon::parse($time);
            return $time->hour * 60 + $time->minute;
        }
    
        $sessionType = session('tutorMain')->tutor->employmentSession->sessionType->id;
        $day = $request->input('day');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
    
        DB::beginTransaction();
    
        try {
            $validatedData = $request->validate([
                'day' => 'required',
                'startTime' => 'required',
                'endTime' => 'required',
            ]);
    
            // Fetch the actual availability times
            $startAvailability = Availability::find($startTime)->availability;
            $endAvailability = Availability::find($endTime)->availability;
    
            // Convert start and end availability to minutes from midnight
            $startMinutes = convertTimeToMinutes($startAvailability);
            $endMinutes = convertTimeToMinutes($endAvailability);
    
            // Fetch all existing sessions for the selected day
            $existingSessions = DayAvailabilitySessionFinal::where('day_id', $day)
                ->where('session_type_id', $sessionType)
                ->where('tutor_main_id', session('tutorMain')->id)
                ->get();
    
            foreach ($existingSessions as $session) {
                $existingStartMinutes = convertTimeToMinutes($session->availabilityStart->availability);
                $existingEndMinutes = convertTimeToMinutes($session->availabilityEnd->availability);
    
                // Check for any overlap, but allow adjacent time slots
                if (
                    ($startMinutes >= $existingStartMinutes && $startMinutes < $existingEndMinutes) || // New start overlaps existing
                    ($endMinutes > $existingStartMinutes && $endMinutes <= $existingEndMinutes) || // New end overlaps existing
                    ($startMinutes <= $existingStartMinutes && $endMinutes >= $existingEndMinutes) // New time slot fully contains an existing slot
                ) {
                    return response()->json(['error' => 'This availability overlaps with an existing availability for the selected day'], 422);
                }
    
                // Check for adjacent time slots and allow them
                if (
                    $endMinutes === $existingStartMinutes || // New end matches existing start (adjacent before)
                    $startMinutes === $existingEndMinutes    // New start matches existing end (adjacent after)
                ) {
                    continue; // Allow adjacent entries
                }
            }
    
            // No overlap found, proceed to save the new availability
            $dayAvailabilitySessionFinal = new DayAvailabilitySessionFinal();
            $dayAvailabilitySessionFinal->day_id = $validatedData['day'];
            $dayAvailabilitySessionFinal->tutor_main_id = session('tutorMain')->id;
            $dayAvailabilitySessionFinal->availability_start_id = $validatedData['startTime'];
            $dayAvailabilitySessionFinal->availability_end_id = $validatedData['endTime'];
            $dayAvailabilitySessionFinal->session_type_id = $sessionType;
            $dayAvailabilitySessionFinal->save();
    
            DB::commit();
    
            return response()->json([
                'message' => 'Availability added successfully',
                'id' => $dayAvailabilitySessionFinal->id,
                'day' => [
                    'day' => $dayAvailabilitySessionFinal->day->day,
                ],
                'availabilityStart' => [
                    'availability' => $dayAvailabilitySessionFinal->availabilityStart->availability,
                ],
                'availabilityEnd' => [
                    'availability' => $dayAvailabilitySessionFinal->availabilityEnd->availability,
                ]
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    

    public function dayTimeFilter(Request $request)
    {
        $dayId = $request->input('filterDay');
        $startTimeId = $request->input('startFilterTime');
        $endTimeId = $request->input('endFilterTime');
    
        // Filter based on the day, start time, and end time
        $availabilitySessions = DayAvailabilitySessionFinal::where('day_id', $dayId)
            ->where('availability_start_id', $startTimeId)
            ->where('availability_end_id', $endTimeId)
            ->get();
    
        return response()->json($availabilitySessions);
    }
    //
}
