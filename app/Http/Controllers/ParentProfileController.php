<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Children;
use App\Models\Gender;
use App\Models\Guardian;
use App\Models\GuardianMain;
use App\Models\Language;
use App\Models\Modality;
use App\Models\Preference;
use App\Models\PreferenceLanguage;
use App\Models\relation;
use App\Models\TeachingStyle;
use App\Models\UserProfile;
use App\Models\YearLevel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ParentProfileController extends Controller
{

    public function index(Request $request)
    {

        $gender =  Gender::get()->all();

        $relation =  relation::get()->all();

        $yearLevel = YearLevel::get()->all();

        $preference = Preference::get()->all();

        $modality = Modality::get()->all();

        $teaching = TeachingStyle::get()->all();

        $language = Language::get()->all();

        $availability = Availability::get()->all();

        $children = Children::latest()->first(); // Get the latest children record

        $userId = session('user_profiles')->id;

        $profile = UserProfile::where('id', $userId)->get('profile_pic');

        $guardianId = session('clientMain')->guardian->id;

        $children = GuardianMain::with([
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
        ])
            ->where('guardian_id', $guardianId)->get();
        //dd($children);
        return view('parent.parentprofile', compact('profile', 'children', 'gender', 'relation', 'yearLevel', 'preference', 'modality', 'language', 'teaching', 'availability'));
    }

    public function editProfilePic(Request $request)
    {
        //editing profile picture
        $request->validate([
            'profilePic' => 'nullable|image|mimes:jpeg,png,jpg', // Adjust max file size as needed
        ]);


        $userId = session('user_profiles')->id;


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


    public function childPic(Request $request)
    {
        //editing profile picture
        $request->validate([
            'profilePic' => 'nullable|image|mimes:jpeg,png,jpg', // Adjust max file size as needed
        ]);

        $userId = session('clientMain')->child->id;

        //dd($userId);
        if ($request->has('profilePic')) {

            $file = $request->file('profilePic');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;
            $path = 'Images/';
            $file->move($path, $filename);

            $profilePic = ['profile_pic' => $path . $filename];

            $childId = $request->input('child_id');

            Children::where('id',  $childId)->update($profilePic);

            return redirect()->back()->with('success', 'Profile picture updated successfully!');
        }

        return redirect()->back()->with('error', 'No profile picture uploaded.');
    }


    public function addChild(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'profilePic' => 'nullable|image|mimes:jpeg,png,jpg',
                'studFname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'studLname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'studGender' => 'required',
                'studBday' => 'required|date|before:today',
                'lrn' => 'nullable|string|regex:/^\d{12}$/',
                'studSchool' => 'required|string',
                'studYearLevel' => 'required'
            ], [
                'profilePic.image' => 'Profile picture must be an image.',
                'profilePic.mimes' => 'Profile picture must be a file of type: jpeg, png, jpg.',
                'studFname.required' => 'Student first name is required.',
                'studFname.regex' => 'Student first name may only contain letters and spaces.',
                'studLname.required' => 'Student last name is required.',
                'studLname.regex' => 'Student last name may only contain letters and spaces.',
                'studGender.required' => 'Student gender is required.',
                'studBday.required' => 'Student birthday is required.',
                'studBday.date' => 'Student birthday must be a valid date.',
                'studBday.before' => 'Student birthday must be a date before today.',
                'lrn.regex' => 'LRN must be a 12-digit number.',
                'studSchool.required' => 'Student school is required.',
                'studYearLevel.required' => 'Student year level is required.'
            ]);

            $userId = session('clientMain')->child->id;

            $children = new Children();
            $children->fname = ucwords(strtolower($request->studFname));
            $children->lname = ucwords(strtolower($request->studLname));
            $children->bday = $request->studBday;
            $children->gender_id = $request->studGender;
            $children->year_level_id = $request->studYearLevel;
            $children->school = ucwords(strtolower($request->studSchool));
            $children->lrn = $request->lrn;


            //dd($userId);
            if ($request->has('profilePic')) {

                $file = $request->file('profilePic');
                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;
                $path = 'Images/';
                $file->move($path, $filename);




                $children->profile_pic = $path . $filename;
                $children->save(); //
            }

            $guardian = new Guardian();
            $guardian->user_profile_id = session('user_profiles')->id;
            $guardian->relation_id = session('clientMain')->guardian->relation->id;

            $guardian->save();

            $preference = new Preference();
            $preference->teaching_style_id = $request->studTeachingStyle;
            $preference->modality_id = $request->studModality;
            $preference->save();


            $languageIds = $request->input('studLanguage');
            $languageString = implode(',', $languageIds);

            if (!is_array($languageIds) || empty($languageIds)) {
                throw new \Exception("No languages provided.");
            } // An array of language IDs

            $preferenceLanguage = new PreferenceLanguage;
            $preferenceLanguage->languages = $languageString;
            $preferenceLanguage->preference_id = $preference->id;
            $preferenceLanguage->save();


            $tutorMain = new GuardianMain();
            $tutorMain->guardian_id = session('clientMain')->guardian->id;
            $tutorMain->child_id = $children->id;
            $tutorMain->preference_language_id = $preferenceLanguage->id;
            $tutorMain->save();


            DB::commit();

            return redirect()->back()->with('success', 'Profile created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function updateChildProfile(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'fname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'lname' => 'required|regex:/^[a-zA-Z\s]+$/',
                'gender' => 'required',
                'bday' => 'required|date|before:today',
                'lrn' => 'nullable|string|regex:/^\d{12}$/',
                'school' => 'required|string',
                'yearLevel' => 'required'
            ], [
                'fname.required' => 'Student first name is required.',
                'fname.regex' => 'Student first name may only contain letters and spaces.',
                'lname.required' => 'Student last name is required.',
                'lname.regex' => 'Student last name may only contain letters and spaces.',
                'gender.required' => 'Student gender is required.',
                'bday.required' => 'Student birthday is required.',
                'bday.date' => 'Student birthday must be a valid date.',
                'bday.before' => 'Student birthday must be a date before today.',
                'lrn.regex' => 'LRN must be a 12-digit number.',
                'school.required' => 'Student school is required.',
                'yearLevel.required' => 'Student year level is required.'
            ]);
            $updateId = $request->input('updateProfile');

            //dd($updateId);

            //dd($request->all());

            $fname = ucwords(strtolower($request->input('fname')));
            $lname = ucwords(strtolower($request->input('lname')));
            $gender = $request->input('gender');
            $bday = $request->input('bday');
            $lrn = $request->input('lrn');
            $school = ucwords(strtolower($request->input('school')));
            $yearLevel = $request->input('yearLevel');


            //dd($newCategory,$newName,$newDescription,$newPrice);
            $editGuardian = GuardianMain::where('child_id', $updateId)->first();

            if (!$editGuardian) {
                return redirect()->back()->with('error', 'Child profile not found.');
            }

            //dd($editGuardian);
            $editGuardian->child->update([
                'fname' => $fname,
                'lname' => $lname,
                'bday' => $bday,
                'lrn' => $lrn,
                'school' => $school,
                'year_level_id' => $yearLevel,
                'gender_id' => $gender
            ]);

            //$editGuardian->child->yearLevel->update([
            //    'year' => $yearLevel,
            //]);

            // dd($editGuardian);
            DB::commit();
            return redirect()->back()->with('success', 'Child profile updated successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function updateStudentPreference(Request $request)
    {
        //dd($request->all());
        $id = $request->input('preference_id');

        DB::beginTransaction();

        $studentPreference = PreferenceLanguage::findOrFail($id);

        //dd($studentPreference); 
        $validatedData = $request->validate([
            'modality' => 'required',
            'learning_style' => 'required',
            'languages' => 'required|array',
        ]);


        // Update modality
        $modalityId = $request->input('modality');


        $studentPreference->preference->each(function ($preference) use ($modalityId) {
            $preference->fill([
                'modality_id' => $modalityId,
            ]);
            $preference->save();
        });



        // Update learning style
        $learningStyleId = $request->input('learning_style');
        $studentPreference->preference->each(function ($preference) use ($learningStyleId) {
            $preference->fill([
                'teaching_style_id' => $learningStyleId,
            ]);
            $preference->save();
        });

        $studentPreference->languages = implode(',', $validatedData['languages']);
        $studentPreference->save();


        DB::commit();

        return redirect()->back()->with('success', 'Student preferences updated successfully.');
    }
}
