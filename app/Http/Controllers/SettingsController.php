<?php

namespace App\Http\Controllers;

use App\Models\EmploymentSession;
use App\Models\Gender;
use App\Models\Guardian;
use App\Models\Password;
use App\Models\relation;
use App\Models\Requirements;
use App\Models\Tutor;
use App\Models\TutorMain;
use App\Models\UserProfile;
use App\Models\ValidId;
use App\Models\VerificationStatus;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index()
    {
        $gender = Gender::all();
        $relation = Relation::all();
        $validIds = ValidId::all();

        $loggedUserId = session('loginId');
        $userProfile = session('user_profiles');

        if (!$loggedUserId || !$userProfile) {
            session()->flash('error', 'Account does not exist.');
            return back();
        }

        $userType = $userProfile->user_type_id;

        // Retrieve profile for the logged-in user
        $profile = UserProfile::find($loggedUserId);

        //dd($profile);
        if (!$profile) {
            session()->flash('error', 'User profile not found.');
            return back();
        }

        // Initialize variables for the view
        //parent
        $relationId = null;
        //tutor
        $requirements = null;
        $educationId = null;
        $verificationId = null;
        $verificationStatus = null;
        $verificationMessage = null;
        //admin

        //head admin


        if ($userType == 1) {
            $parent = Guardian::where('user_profile_id', $loggedUserId)->first();

            if ($parent) {
                $relationId = $parent->relation_id;
            }
        }

        if ($userType == 2) {
            $tutor = Tutor::where('user_profile_id', $loggedUserId)->first();
            $messages = [
                1 => 'Your account is verified. You can now accept bookings.',
                2 => 'Your account is pending admin verification. Please wait to accept bookings.',
                3 => 'Your account verification was declined. Please review and resubmit your documents.'
            ];

            if ($tutor) {
                $tutorId = $tutor->id;
                $employment = $tutor->employment_session_id;

                $tutorMain = TutorMain::where('tutor_id', $tutorId)->first();
                $requirementsId = $tutorMain->requirements_id;
                $educationId = $tutorMain->education_level_id;

                $requirements = Requirements::find($requirementsId);
                $verificationId = $tutor->verification_status_id;

                $verificationStatus = VerificationStatus::find($verificationId)->verify_status;
                $verificationMessage = $messages[$verificationId];
            }
        }

        // Pass all variables to the view, even if some are null
        return view(
            'utilities.settings',
            compact(
                'validIds',
                'gender',
                'relation',
                'profile',
                'relationId',
                'requirements',
                'educationId',
                'verificationId',
                'verificationStatus',
                'verificationMessage'
            )
        );
    }

    public function updateAccount(Request $request)
    {
        $loggedUserId = session('loginId');

        $request->validate([
            'fname' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'lname' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'bday' => 'required|date|before:today',
            'gender' => 'required',
            'cpnum' => 'required|digits:11|starts_with:09|unique:user_profiles,contact_num,' . $loggedUserId,
            'email' => 'required|email|max:255|unique:user_profiles,email,' . $loggedUserId,
            'relation' => 'nullable',
        ], [
            'fname.required' => 'First name is required.',
            'fname.regex' => 'First name should contain only letters and spaces.',
            'lname.required' => 'Last name is required.',
            'lname.regex' => 'Last name should contain only letters and spaces.',
            'country.required' => 'Country is required.',
            'city.required' => 'City is required.',
            'address.required' => 'Address is required.',
            'bday.required' => 'Birthday is required.',
            'bday.date' => 'Birthday must be a valid date.',
            'bday.before' => 'Birthday must be a date before today.',
            'gender.required' => 'Gender is required.',
            'cpnum.required' => 'Contact number is required.',
            'cpnum.digits' => 'Contact number must be exactly 11 digits.',
            'cpnum.starts_with' => 'Contact number must start with "09".',
            'cpnum.unique' => 'Contact number has already been taken.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'Email has already been taken.',
        ]);


        $fname = ucwords(strtolower($request->input('fname')));
        $lname = ucwords(strtolower($request->input('lname')));
        $country = ucwords(strtolower($request->input('country')));
        $city = ucwords(strtolower($request->input('city')));
        $address = ucwords(strtolower($request->input('address')));
        $bday = $request->input('bday');
        $gender = $request->input('gender');
        $cpnum = $request->input('cpnum');
        $email = $request->input('email');
        $relation = $request->input('relation'); //for parent only

        $user = UserProfile::find($loggedUserId);

        if (!$user) {
            session()->flash('error', 'Account does not exist.');
            return back();
        }

        $userType = $user->user_type_id;
        $originalEmail = $user->email;

        $updatedEmail = false;
        
        if( strtolower(trim($originalEmail)) !== strtolower(trim($email)) ){
            $updatedEmail = true;
        }

        DB::beginTransaction();
        try {
            $user->fname = $fname;
            $user->lname = $lname;
            $user->country = $country;
            $user->municipality = $city;
            $user->address = $address;
            $user->bday = $bday;
            $user->gender_id = $gender;
            $user->contact_num = $cpnum;
            $user->email = $email;
            
            if($updatedEmail){
                 $user->email_verify = 0;
            }
            
            $user->save();
            
            if($updatedEmail){
               $user->sendEmailVerificationNotification();
            }

            if ($userType == 1) {
                $guardian = Guardian::where('user_profile_id', $loggedUserId)->first();
                if ($guardian) {
                    $guardian->relation_id = $relation;
                    $guardian->save();
                }
            }

            DB::commit();
            
            session()->flash('success', 'Account updated successfully.');
            
            if($updatedEmail){
                session()->flash('info', 'Email verification link has been sent to new email. Please verify your new email.');
            }
            
            return back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred while updating the account. Please try again.');
            return back();
        }
    }
    public function updatePassword(Request $request)
    {
        //dd($request->all());

        $loggedUserId = session('loginId');

        $user = UserProfile::find($loggedUserId);

        if (!$user) {
            session()->flash('error', 'Account does not exist.');
            return back();
        }

        $password = Password::where('user_profile_id', $loggedUserId)->first();

        if (!$password) {
            session()->flash('error', 'Password does not exist.');
            return back();
        }

        if (!Hash::check($request->input('currentpass'), $password->password_hash)) {
            session()->flash('error', 'Current password is incorrect. Please try again.');
            return back();
        }
        
        $request->validate([
            'currentpass' => 'required',
            'newpass' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/|different:currentpass',
            'confirmnew' => 'required|same:newpass',
        ], [
            'currentpass.required' => 'Current password is required.',
            'newpass.required' => 'New password is required.',
            'newpass.min' => 'New password should be at least 8 characters.',
            'newpass.regex' => 'New password must contain at least 1 special character (!_*), 1 uppercase, 1 lowercase, 1 digit.',
            'newpass.different' => 'The new password must be different from the current password.',
            'confirmnew.required' => 'Confirm new password is required.',
            'confirmnew.same' => 'New password and confirm new password should match.',
        ]);

        

        DB::beginTransaction();
        try {

            $password->password_hash = Hash::make($request->input('newpass'));
            $password->save();

            DB::commit();
            session()->flash('success', 'Password updated successfully.');
            return back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred while updating the password. Please try again.');
            return back();
        }
    }
    public function updateRequirements(Request $request)
    {
        $loggedUserId = session('loginId');

        $user = UserProfile::find($loggedUserId);

        if (!$user) {
            session()->flash('error', 'Account does not exist.');
            return back();
        }

        $userType = $user->user_type_id;

        if ($userType !== 2) {
            session()->flash('error', 'You are not authorized to update requirements.');
            return back();
        }

        $tutor = Tutor::where('user_profile_id', $loggedUserId)->first();

        if (!$tutor) {
            session()->flash('error', 'Tutor does not exist.');
            return back();
        }

        $tutorID = $tutor->id;

        $tutorMain = TutorMain::where('tutor_id', $tutorID)->first();

        if (!$tutorMain) {
            session()->flash('error', 'Tutor main does not exist.');
            return back();
        }

        $educationID = $tutorMain->education_level_id;
        $requirementID = $tutorMain->requirements_id;

        $requirements = Requirements::find($requirementID);

        if (!$requirements) {
            session()->flash('error', 'Requirements does not exist.');
            return back();
        }

        $validationRules = [
            'uploadResume' => 'nullable|mimes:pdf',
            'uploadValidId' => 'nullable|mimes:pdf',
            'validIdType' => 'required',
            'validIdNum' => 'required|string|regex:/^\d{1,20}$/'
        ];

        if ($educationID == 1) {
            $validationRules = array_merge($validationRules, [
                'uploadTOR' => 'nullable|mimes:pdf',
                'uploadDiploma' => 'nullable|mimes:pdf',
                'uploadPRC' => 'nullable|mimes:pdf',
                'prcNum' => 'nullable|string|regex:/^\d{7}$/'
            ]);
        } elseif ($educationID == 2) {
            $validationRules['uploadCOE'] = 'nullable|mimes:pdf';
        }

        $messages = [
            'uploadResume.mimes' => 'The Resume document must be a PDF file.',
            'uploadValidId.mimes' => 'The valid ID must be a PDF file.',
            'uploadPRC.mimes' => 'The PRC ID must be a PDF file.',
            'uploadCOE.mimes' => 'The Certificate of Employment (COE) document must be a PDF file.',
            'uploadDiploma.mimes' => 'The Diploma document must be a PDF file.',
            'uploadTOR.mimes' => 'The Transcript of Records (TOR) document must be a PDF file.',

            'validIdNum.regex' => 'The valid ID number must be between 1 and 20 digits.',
            'validIdNum.required' => 'The valid ID number is required.',
            'validIdType.required' => 'Please select a valid ID type.',

            'prcNum.regex' => 'The PRC number must be a number and exactly 7 digits.',
        ];

        $request->validate($validationRules, $messages);

        DB::beginTransaction();
        try {

            $uploadedFiles = [];

            $fileFields = [
                'uploadResume' => 'resume_upload',
                'uploadDiploma' => 'diploma_upload',
                'uploadTOR' => 'tor_upload',
                'uploadValidId' => 'upload_valid_id',
                'uploadPRC' => 'upload_prc',
                'uploadCOE' => 'certificate_of_enrollment',
            ];

            foreach ($fileFields as $filekey => $dbcolumn) {
                if ($request->hasFile($filekey)) {
                    $file = $request->file($filekey);
                    $originalName = $file->getClientOriginalName();
                    $filename = time() . '.' . $originalName;
                    $path = 'Requirements';
                    $uploadedFile = $file->move($path, $filename);
                    $uploadedFiles[$dbcolumn] = $uploadedFile;
                }
            }

            foreach ($uploadedFiles as $dbcolumn => $filepath) {
                $requirements->$dbcolumn = $filepath;
            }

            $requirements->valid_id_type = $request->validIdType;
            $requirements->valid_id_number = $request->validIdNum;
            $requirements->prc_number = $requiest->prcNum ?? null;
           

            $requirements->save();
            DB::commit();

            session()->flash('success', 'Requirements updated successfully.');
            return back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred while updating the requirements. Please try again.');
            return back();
        }
    }
}
