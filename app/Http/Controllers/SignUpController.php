<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClient;
use App\Http\Requests\CreateGradTutor;
use App\Http\Requests\CreateUnderTutor;
use App\Models\Availability;
use App\Models\Children;
use App\Models\Department;
use App\Models\DepartmentYearSubject;
use App\Models\EmploymentSession;
use App\Models\EmploymentType;
use App\Models\Gender;
use App\Models\Guardian;
use App\Models\GuardianMain;
use App\Models\Language;
use App\Models\Modality;
use App\Models\Password;
use App\Models\Preference;
use App\Models\PreferenceLanguage;
use App\Models\relation;
use App\Models\Requirements;
use App\Models\Subject;
use App\Models\TeachingStyle;
use App\Models\Tutor;
use App\Models\TutorMain;
use App\Models\UserProfile;
use App\Models\ValidId;
use App\Models\ValidIdType;
use App\Models\YearLevel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignUpController extends Controller
{

    public function signUpClient()
    {
        $gender =  Gender::get()->all();

        $relation =  relation::get()->all();

        $yearLevel = YearLevel::get()->all();

        return view('guest.createclient', compact('gender', 'relation', 'yearLevel'));
    }

    public function sendCreateClient(CreateClient $request)
    {

        DB::beginTransaction();
        try {
            $userprofile = new UserProfile();
            $userprofile->fname = ucwords(strtolower($request->fname));
            $userprofile->lname = ucwords(strtolower($request->lname));
            $userprofile->bday = $request->bday;
            $userprofile->gender_id = $request->gender;
            $userprofile->email = $request->clientEmail;
            $userprofile->country = ucwords(strtolower($request->country));
            $userprofile->municipality = ucwords(strtolower($request->city));
            $userprofile->address = ucwords(strtolower($request->address));
            $userprofile->contact_num = $request->cpNum;
            $userprofile->user_status_id = 1;
            $userprofile->user_type_id = 1;

            $userprofile->save();

            $userprofile->sendEmailVerificationNotification();

            $password = new Password();
            $password->user_profile_id = $userprofile->id;
            $password->password_hash = Hash::make($request->clientPassword);
            $password->is_deleted = 0;

            $password->save();

            $guardian = new Guardian();
            $guardian->user_profile_id = $userprofile->id;
            $guardian->relation_id = $request->relation;

            $guardian->save();


            $children = new Children();
            $children->fname = ucwords(strtolower($request->studFname));
            $children->lname = ucwords(strtolower($request->studLname));
            $children->bday = $request->studBday;
            $children->gender_id = $request->studGender;
            $children->year_level_id = $request->yearLevel;
            $children->school = ucwords(strtolower($request->studSchool));
            $children->lrn = $request->lrn;
            $children->save();



            DB::commit();



            $request->session()->put('user_profile', $userprofile);
            $request->session()->put('children_id', $children);




            return redirect('/signup-client-preferences')->with('success', 'Choose your preferences');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function clientPreference()
    {

        $preference = Preference::get()->all();

        $modality = Modality::get()->all();


        $teaching = TeachingStyle::get()->all();
        $language = Language::get()->all();

        $availability = Availability::get()->all();


        $children = Children::latest()->first(); // Get the latest children record


        return view('guest.clientpreferences', compact('preference', 'modality', 'language', 'teaching', 'children'));
    }

    public function sendClientPreference(Request $request)
    {

        DB::beginTransaction();
        try {
            $userProfile = $request->session()->get('user_profile');
            $children = $request->session()->get('children_id');



            $guardian = Guardian::where('user_profile_id', $userProfile->id)->first();


            $preference = new Preference();
            $preference->teaching_style_id = $request->teaching_style;
            $preference->modality_id = $request->modality;
            $preference->save();


            $languageIds = $request->input('language');
            $languageString = implode(',', $languageIds);

            if (!is_array($languageIds) || empty($languageIds)) {
                throw new \Exception("No languages provided.");
            } // An array of language IDs

            $preferenceLanguage = new PreferenceLanguage;
            $preferenceLanguage->languages = $languageString;
            $preferenceLanguage->preference_id = $preference->id;
            $preferenceLanguage->save();


            $tutorMain = new GuardianMain();
            $tutorMain->guardian_id = $guardian->id;
            $tutorMain->child_id = session('children_id')->id;
            $tutorMain->preference_language_id = $preferenceLanguage->id;
            $tutorMain->save();





            DB::commit();
            $request->session()->forget('user_profile');
            $request->session()->forget('children_id');

            return redirect('/login')->with('Success', 'Your Account Has been created')->with('info', 'Email verification link has been sent to your email address. Please check your email to verify your account.');
        } catch (Exception $e) {
            //dd($e);
            DB::rollBack();
            throw $e;
        }
    }

    public function underGradChoice()
    {
        return view('guest.tutorchoice');
    }

    public function signUpTutorUnder()
    {
        $gender =  Gender::get()->all();

        $yearLevel = YearLevel::get()->all();



        $valid = ValidId::get()->all();

        return view('guest.createtutorundergrad', compact('gender', 'yearLevel', 'valid'));
    }

    public function sendCreateTutorUnder(CreateUnderTutor $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        try {
            $userprofile = new UserProfile();
            $userprofile->fname = ucwords(strtolower($request->underFname));
            $userprofile->lname = ucwords(strtolower($request->underLname));
            $userprofile->bday = $request->underBday;
            $userprofile->gender_id = $request->underGender;
            $userprofile->email = $request->underEmail;
            $userprofile->country = ucwords(strtolower($request->underCountry));
            $userprofile->municipality = ucwords(strtolower($request->underCity));
            $userprofile->address = ucwords(strtolower($request->underAddress));
            $userprofile->contact_num = $request->underCpNum;
            $userprofile->user_status_id = 1;
            $userprofile->user_type_id = 2;

            $userprofile->save();

            $userprofile->sendEmailVerificationNotification();

            $password = new Password();
            $password->user_profile_id = $userprofile->id;
            $password->password_hash = Hash::make($request->underPassword);
            $password->is_deleted = 0;

            $password->save();


            $employSession = new EmploymentSession();
            $employSession->session_type_id = 2;
            $employSession->employment_type_id = 1;

            $employSession->save();

            $tutor = new Tutor();
            $tutor->user_profile_id = $userprofile->id;
            $tutor->employment_session_id = $employSession->id;
            $tutor->verification_status_id = 2;

            $tutor->save();

            $requirements = new Requirements();
            $requirements->school = ucwords(strtolower($request->underSchool));

            $uploadedFiles = [];

            foreach (['coe', 'underResume', 'underUploadValid'] as $fileKey) {
                if ($request->hasFile($fileKey)) {
                    $file = $request->file($fileKey);
                    $originalName = $file->getClientOriginalName();
                    $filename = time() . '.' . $originalName;
                    $path = 'Requirements';
                    $uploadedFile =  $file->move($path, $filename);
                    $uploadedFiles[$fileKey] = $uploadedFile;
                }
            }


            $requirements->certificate_of_enrollment = $uploadedFiles['coe'];
            $requirements->resume_upload = $uploadedFiles['underResume'];
            $requirements->upload_valid_id = $uploadedFiles['underUploadValid'];

            $requirements->valid_id_type = $request->underValid;
            $requirements->valid_id_number = $request->underValidNum;

            $requirements->save();

            DB::commit();

            $request->session()->put('user_profile', $userprofile);
            $request->session()->put('requirements_id', $requirements->id);
            $request->session()->put('employmentSession_id', $employSession);
            $request->session()->put('educationLevel_id', 2);


            return redirect('/signup-tutor-preferences')->with('success', 'Choose your teaching preferences');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function signUpTutorGrad()
    {
        $gender =  Gender::get()->all();

        $yearLevel = YearLevel::get()->all();

        $employment = EmploymentType::get()->all();

        $valid = ValidId::get()->all();

        return view('guest.createtutorgrad', compact('gender', 'yearLevel', 'employment', 'valid'));
    }

    public function sendCreateTutorGrad(CreateGradTutor $request)
    {
        $employment_type = $request->employment;
        $session_type_id = ($employment_type == 1) ? 2 : (($employment_type == 2) ? 1 : null);

        DB::beginTransaction();
        try {
            $userprofile = new UserProfile();
            $userprofile->fname = ucwords(strtolower($request->gradFname));
            $userprofile->lname = ucwords(strtolower($request->gradLname));
            $userprofile->bday = $request->gradBday;
            $userprofile->gender_id = $request->gradGender;
            $userprofile->email = $request->gradEmail;
            $userprofile->country = ucwords(strtolower($request->gradCountry));
            $userprofile->municipality = ucwords(strtolower($request->gradCity));
            $userprofile->address = ucwords(strtolower($request->gradAddress));
            $userprofile->contact_num = $request->gradCpNum;
            $userprofile->user_status_id = 1;
            $userprofile->user_type_id = 2;

            $userprofile->save();

            $userprofile->sendEmailVerificationNotification();
            
            $password = new Password();
            $password->user_profile_id = $userprofile->id;
            $password->password_hash = Hash::make($request->gradPassword);
            $password->is_deleted = 0;

            $password->save();


            $employSession = new EmploymentSession();
            $employSession->session_type_id = $session_type_id;
            $employSession->employment_type_id = $employment_type;

            $employSession->save();

            $tutor = new Tutor();
            $tutor->user_profile_id = $userprofile->id;
            $tutor->employment_session_id = $employSession->id;
            $tutor->verification_status_id = 2;

            $tutor->save();

            $requirements = new Requirements();
            $requirements->school = ucwords(strtolower($request->gradSchool));
            $requirements->year_of_graduate = $request->gradYear;
            $requirements->degree = ucwords(strtolower($request->degree));

            $uploadedFiles = [];

            foreach (['gradTor', 'diploma', 'gradResume', 'gradUploadValid'] as $fileKey) {
                if ($request->hasFile($fileKey)) {
                    $file = $request->file($fileKey);
                    $originalName = $file->getClientOriginalName();
                    $filename = time() . '.' . $originalName;
                    $path = 'Requirements/';
                    $uploadedFile =  $file->move($path, $filename);
                    $uploadedFiles[$fileKey] = $uploadedFile;
                }
            }

            if ($request->hasFile('uploadPrc')) {
                $file = $request->file('uploadPrc');
                $originalName = $file->getClientOriginalName();
                $filename = time() . '.' . $originalName;
                $path = 'Requirements/';
                $uploadedFile =  $file->move($path, $filename);
                $uploadedFiles['uploadPrc'] = $uploadedFile;
            }


            $requirements->tor_upload = $uploadedFiles['gradTor'];
            $requirements->diploma_upload = $uploadedFiles['diploma'];
            $requirements->resume_upload = $uploadedFiles['gradResume'];
            $requirements->valid_id_type = $request->gradValid;
            $requirements->valid_id_number = $request->gradValidNum;
            $requirements->upload_valid_id = $uploadedFiles['gradUploadValid'];
            $requirements->prc_number = $request->prcNum ?? null;


            if (isset($uploadedFiles['uploadPrc'])) {
                $requirements->upload_prc = $uploadedFiles['uploadPrc'];
            }

            $requirements->save();

            DB::commit();

            $request->session()->put('user_profile', $userprofile);
            $request->session()->put('requirements_id', $requirements->id);
            $request->session()->put('employmentSession_id', $employSession);
            $request->session()->put('educationLevel_id', 1);


            return redirect('/signup-tutor-preferences')->with('success', 'Choose your teaching preferences');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function tutorPreference()
    {

        //$yearLevel = YearLevel::get()->all();
        $yearLevel = [];

        $preference = Preference::get()->all();

        $modality = Modality::get()->all();

        $teaching = TeachingStyle::get()->all();
        $language = Language::get()->all();

        $availability = Availability::get()->all();

        $department = Department::get()->all();

        //$subject = Subject::get()->all();
        $subject = [];


        return view('guest.tutorpreferences', compact('preference', 'modality', 'teaching', 'language', 'availability', 'department', 'yearLevel', 'subject'));
    }

    public function sendTutorPreference(Request $request)
    {
        $language = Language::get()->all();


        DB::beginTransaction();
        try {
            $userProfile = $request->session()->get('user_profile');
            $requirements = Requirements::find($request->session()->get('requirements_id'));
            $employmentSession = EmploymentSession::find($request->session()->get('employmentSession_id'));
            
            $tutor = Tutor::where('user_profile_id', $userProfile->id)->first();

            $preference = new Preference();
            $preference->teaching_style_id = $request->tutorTeaching_style;
            $preference->modality_id = $request->tutorModality;
            $preference->save();

            $languageIds = $request->input('tutorLanguage');
            $languageString = implode(',', $languageIds);

            if (!is_array($languageIds) || empty($languageIds)) {
                throw new \Exception("No languages provided.");
            } // An array of language IDs

            $preferenceLanguage = new PreferenceLanguage;
            $preferenceLanguage->languages = $languageString;
            $preferenceLanguage->preference_id = $preference->id;
            $preferenceLanguage->save();

            $subject = $request->input('subject');
            $grade = $request->input('grade');
            $dept = $request->input('dept');

            $deptYearLevel = DepartmentYearSubject::where('subject_id', $subject)
                ->where('year_id', $grade)
                ->where('department_id', $dept)
                ->first();

            if ($deptYearLevel) {
                $tutorMain = new TutorMain();
                $tutorMain->tutor_id = $tutor->id;
                $tutorMain->education_level_id = session('educationLevel_id');
                $tutorMain->requirements_id = $requirements->id;

                $tutorMain->department_year_subject_id = $deptYearLevel->id;

                $tutorMain->preference_language_id = $preferenceLanguage->id;
                $tutorMain->save();
            }


            //$preference->languages()->sync($languageIds);


            /* foreach ($languageIds as $languageId) {
            $preferenceLanguage = new PreferenceLanguage;
            $preferenceLanguage->language_id=$languageId;
            $preferenceLanguage->preference_id=$preference->id;
            $preferenceLanguage->save();
            
            
            $subject = $request ->input('subject');
            $grade= $request ->input('grade');
            $dept = $request ->input('dept');



            $deptYearLevel = DepartmentYearSubject::where('subject_id',$subject)
            ->where('year_id',$grade)
            ->where('department_id',$dept)
            ->first();

            

            $employmentType = session('employmentSession_id')->employment_type_id;
            

            
            if($deptYearLevel){
                $tutorMain= new TutorMain();
                $tutorMain->tutor_id = $tutor->id;
                
                if($employmentType == 2) {
                    $tutorMain->education_level_id = 1;
                    
                }elseif($employmentType == 1) {
                    $tutorMain->education_level_id = 2;
                    
                }
              
                $tutorMain->requirements_id = $requirements->id;
                
                $tutorMain->department_year_subject_id = $deptYearLevel->id;
                
                $tutorMain->preference_language_id = $preferenceLanguage->id;
                $tutorMain->save();
            }
        
        }
        */

            DB::commit();
            $request->session()->forget('user_profile');
            $request->session()->forget('requirements_id');
            $request->session()->forget('employmentSession_id');
            $request->session()->forget('educationLevel_id');

            return redirect('/login')->with('success', 'Your Account Has been created')->with('info', 'Email verification link has been sent to your email address. Please check your email to verify your account.');
        } catch (Exception $e) {

            dd($e);
            DB::rollBack();
            throw $e;
        }
    }

    public function getGradeLevel(Request $request)
    {
        $dept = $request->query('id');

        $gradeLevel = DepartmentYearSubject::with('gradeLevel')
            ->select('department_id', 'year_id')
            ->distinct()
            ->where('department_id', $dept)
            ->get();

        return $gradeLevel;
    }

    public function getSubject(Request $request)
    {
        $grade = $request->query('grade');
        $dept = $request->query('dept');

        $gradeLevel = DepartmentYearSubject::with('subject')
            ->select('department_id', 'year_id', 'subject_id')
            ->distinct()
            ->where('department_id', $dept);

        if (isset($grade)) {
            $gradeLevel = $gradeLevel->where('year_id', $grade);
        }

        $gradeLevel = $gradeLevel->get();

        return $gradeLevel;
    }
}
