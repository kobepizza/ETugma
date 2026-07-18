<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Children;
use App\Models\EducationLevel;
use App\Models\EmploymentType;
use App\Models\Gender;
use App\Models\GuardianMain;
use App\Models\Notification;
use App\Models\Password;
use App\Models\SessionTypes;
use App\Models\Tutor;
use App\Models\TutorMain;
use App\Models\UserProfile;
use App\Models\UserStatus;
use App\Models\VerificationStatus;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HeadAdminController extends Controller
{

  //actions
  public function sendMessage(Request $request)
  {
    $loggedUserID = session('loginId');
    $user = UserProfile::find($loggedUserID);
    $loggedUserType = $user->user_type_id;
    $username = "$user->fname $user->lname";

    if ($loggedUserType !== 4) {
      return response()->json(['error' => true, 'message' => 'Your do not have authorization for this action.']);
    }

    $receiverID = $request->input('messageID');
    $subject = $request->input('subject');
    $message = $request->input('message');

    $receiver = UserProfile::find($receiverID);
    $receiverUserType = $receiver->user_type_id;

    if (empty($receiver)) {
      return response()->json(['error' => true, 'message' => 'User not found.']);
    }

    if (empty($subject)) {
      return response()->json(['error' => true, 'message' => 'Subject cannot be empty.']);
    }

    if (empty($message)) {
      return response()->json(['error' => true, 'message' => 'Message cannot be empty.']);
    }


    if ($user && $receiver) {
      DB::beginTransaction();
      //create new notification
      $Notif = new Notification();
      $Notif->user_id = $receiverID; //receiver
      $Notif->title = "An admin sent you a message";
      $Notif->author = $username; //sender
      $Notif->content = "<span class='fw-bold'>Subject: </span> <br><br> $subject <br><br> <span class='fw-bold'>Message: </span> <br><br>$message";
      $Notif->notification_type = 1; //1 for notif 2 for message 3 for announcement
      $Notif->user_type = $receiverUserType;
      $Notif->seen = 0;
      $Notif->booking_id = 0;
      $Notif->tutoring_session_id = 0;
      $Notif->created_at = now()->setTimezone(config('app.timezone'));
      $Notif->save();

      //send notification
      event(new UserNotification([
        'user_id' => $receiverID,
        'user_type' => '',
        'author' => $Notif->author,
        'title' => $Notif->title,
        'content' => $Notif->content,
        'time' => $Notif->created_at,
        'type' => $Notif->notification_type
      ]));

      DB::commit();
      return response()->json(['success' => true, 'message' => 'Message sent successfully!']);
    } else {
      return response()->json(['error' => true, 'message' => 'An error occured while executing the action']);
    }
  }
  public function switchUser(Request $request)
  {

    $loggedUserID = session('loginId');
    $loggedUser = UserProfile::find($loggedUserID);
    $loggedUserType = $loggedUser->user_type_id;
    $loggedUserName = "$loggedUser->fname $loggedUser->lname";

    if ($loggedUserType !== 4) {
      return response()->json(['error' => true, 'message' => 'Your do not have authorization for this action.']);
    }

    $userID = $request->input('userID');
    $remarks = $request->input('reason');

    $userProfile = UserProfile::find($userID);

    if (!$userProfile) {
      return response()->json(['error' => true, 'message' => 'User does not exist.']);
    }
    if (empty($remarks)) {
      return response()->json(['error' => true, 'message' => 'Message cannot be empty.']);
    }

    $userStatus = $userProfile->user_status_id;
    $userTypeID = $userProfile->user_type_id;
    $userType = $userProfile->userType->type;
    $receiverID = $userProfile->id;
    $deactivate = false;

    if ($userStatus == 1) {
      $deactivate = true;
    }

    $placeholder = [
      '1' => 'Reason for deactivation',
      '2' => 'Message'
    ];

    $statusMessage = [
      '1' => 'deactivated',
      '2' => 'activated'
    ];

    $notifPlaceholder = $placeholder[$userStatus];
    $notifStatus = $statusMessage[$userStatus];

    if ($loggedUser && $userProfile) {

      DB::beginTransaction();

      if ($deactivate == true) {
        $userProfile->user_status_id = 2;
      } else {
        $userProfile->user_status_id = 1;
      }
      $userProfile->save();

      //create new notification
      $Notif = new Notification();
      $Notif->user_id = $receiverID; //receiver
      $Notif->title = "An admin has $notifStatus your account";
      $Notif->author = $loggedUserName; //sender
      $Notif->content = "<span class='fw-bold'>$notifPlaceholder: </span><br><br>$remarks";
      $Notif->notification_type = 1; //1 for notif 2 for message 3 for announcement
      $Notif->user_type = $userTypeID;
      $Notif->seen = 0;
      $Notif->booking_id = 0;
      $Notif->tutoring_session_id = 0;
      $Notif->created_at = now()->setTimezone(config('app.timezone'));
      $Notif->save();

      //send notification
      event(new UserNotification([
        'user_id' => $receiverID,
        'user_type' => '',
        'author' => $Notif->author,
        'title' => $Notif->title,
        'content' => $Notif->content,
        'time' => $Notif->created_at,
        'type' => $Notif->notification_type
      ]));

      DB::commit();
      return response()->json(['success' => true, 'message' => $userType . ' ' . $notifStatus . ' successfully']);
    } else {
      return response()->json(['error' => true, 'message' => 'An error occured while executing the action']);
    }
  }
  //

  //head admin profile
  public function index()
  {

    $userId = session('user_profiles')->id;

    $profile = UserProfile::where('id', $userId)->get('profile_pic')
      ->first();

    return view('head_admin.headadminprofile', compact('profile'));
  }

  public function editProfilePic(Request $request)
  {
    //editing profile picture
    $request->validate([
      'profilePic' => 'nullable|image|mimes:jpeg,png,jpg', // Adjust max file size as needed
    ]);

    $userId = session('loginId');

    $profile = UserProfile::find($userId);

    if (!$profile) {
      return redirect()->back()->with('error', 'Profile does not exist.');
    }

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
  //
  //manage tutors
  public function headAdminTutor()
  {
    $userStatus = UserStatus::all();
    $education = EducationLevel::all();
    $employment = EmploymentType::all();
    $session = SessionTypes::all();
    $verification = VerificationStatus::all();


    return view('head_admin.headadmintutors', compact('userStatus', 'education', 'employment', 'session', 'verification'));
  }

  public function loadTutors()
  {

    $tutorMain = TutorMain::with([
      'tutor.userProfile',
      'tutor.userProfile.gender',
      'tutor.userProfile.userStatus',
      'tutor.userProfile.userType',
      'tutor.employmentSession',
      'tutor.employmentSession.sessionType',
      'tutor.verificationStatus',
      'tutor.employmentSession.employmentType',
      'educationLevel',
      'requirement',
      'preferenceLanguage',
      'preferenceLanguage.language',
      'preferenceLanguage.preference',
      'preferenceLanguage.preference.teachingStyle',
      'preferenceLanguage.preference.modality',
      'preferenceLanguage.preference.availability',
      'departmentYearSubject.department',
      'departmentYearSubject.subject',
      'departmentYearSubject.gradeLevel'
    ])->get();

    $tutorCount = UserProfile::where('user_type_id', 2)->count();

    $response = [
      'tutors' => $tutorMain,
      'tutorCount' => $tutorCount,
    ];

    return response()->json($response);
  }

  public function searchTutors(Request $request)
  {
    $searchQuery = $request->input('query');

    $search = TutorMain::with(
      'tutor.userProfile',
      'tutor.userProfile.gender',
      'tutor.userProfile.userStatus',
      'tutor.userProfile.userType',
      'tutor.employmentSession',
      'tutor.employmentSession.sessionType',
      'tutor.verificationStatus',
      'tutor.employmentSession.employmentType',
      'educationLevel',
      'requirement',
      'preferenceLanguage',
      'preferenceLanguage.language',
      'preferenceLanguage.preference',
      'preferenceLanguage.preference.teachingStyle',
      'preferenceLanguage.preference.modality',
      'preferenceLanguage.preference.availability',
      'departmentYearSubject.department',
      'departmentYearSubject.subject',
      'departmentYearSubject.gradeLevel'
    )
      ->where(function ($query) use ($searchQuery) {
        // Search by child's first or last name or their full name
        $query->whereHas('tutor.userProfile', function ($q) use ($searchQuery) {
          $q->where('fname', 'LIKE', "%{$searchQuery}%")
            ->orWhere('lname', 'LIKE', "%{$searchQuery}%")
            ->orWhere('email', 'LIKE', "%{$searchQuery}%")
            ->orWhere(DB::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$searchQuery}%");
        });
      })
      ->get();

    return response()->json($search);
  }

  //

  //manage parents
  public function headAdminParent()
  {
    $userStatus = UserStatus::all();

    return view('head_admin.headadminclients', compact('userStatus'));
  }

  public function loadParents()
  {

    $uniqueGuardianIds = GuardianMain::selectRaw('MIN(id) as id') // Selects the minimum id for each guardian_id
      ->groupBy('guardian_id') // Groups by guardian_id to ensure uniqueness
      ->pluck('id'); // Plucks the id values

    $guardianMain = GuardianMain::with([
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
      ->whereIn('id', $uniqueGuardianIds)
      ->get();

    //dd($guardianMain);

    $guardianMain->each(function ($item) {
      $guardianId = optional($item)->guardian_id;

      // Query the rates table
      $childCount = GuardianMain::where('guardian_id', $guardianId)
        ->count();

      // Attach the rate to the current item
      $item->setAttribute('childCount', $childCount);
    });

    //dd($guardianMain);
    $parentCount = UserProfile::where('user_type_id', 1)->count();

    $response = [
      'parents' => $guardianMain,
      'parentCount' => $parentCount
    ];
    //dd($response);
    return response()->json($response);
  }

  public function searchParents(Request $request)
  {
    $searchQuery = $request->input('query');

    $uniqueGuardianIds = GuardianMain::selectRaw('MIN(id) as id') // Selects the minimum id for each guardian_id
      ->groupBy('guardian_id') // Groups by guardian_id to ensure uniqueness
      ->pluck('id'); // Plucks the id values

    $search = GuardianMain::with([
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
      ->whereIn('id', $uniqueGuardianIds)

      ->where(function ($query) use ($searchQuery) {
        // Search by child's first or last name or their full name
        $query->whereHas('guardian.userProfile', function ($q) use ($searchQuery) {
          $q->where('fname', 'LIKE', "%{$searchQuery}%")
            ->orWhere('lname', 'LIKE', "%{$searchQuery}%")
            ->orWhere('email', 'LIKE', "%{$searchQuery}%")
            ->orWhere(DB::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$searchQuery}%");
        });
      })
      ->get();


    $search->each(function ($item) {
      $guardianId = optional($item)->guardian_id;

      // Query the rates table
      $childCount = GuardianMain::where('guardian_id', $guardianId)
        ->count();

      // Attach the rate to the current item
      $item->setAttribute('childCount', $childCount);
    });

    return response()->json($search);
  }

  //

  /*ADMIN CHILD
  public function headAdminChild()
  {

    $clientMain = GuardianMain::with([
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
    ])->get();


    return view('head_admin.headadminchild', compact('clientMain'));
  }

  public function deleteChild(Request $request)
  {
    $parent_id = $request->input('deleteChild_id');


    //dd($tutor_id);
    $deleteParent = GuardianMain::find($parent_id);

    //dd($deleteTutor);

    $deleteParent->delete();

    return redirect()->back()->with('success', 'Credential Successfully deleted.');
  }

  public function deactivateChild(Request $request)
  {

    $child_id = $request->input('deactivateChild_id');

    $deactivateChild = GuardianMain::find($child_id);

    //dd($deleteTutor);

    $deactivateChild->guardian->userProfile->update([
      'user_status_id' => 2
    ]);

    return redirect()->back()->with('success', 'Credential Successfully deleted.');
  }
  */

  //manage admins
  public function manageAdmin()
  {
    $userStatus = UserStatus::all();
    $gender = Gender::all();

    //dd($admin);
    return view('head_admin.headadminmanageadmin', compact('userStatus', 'gender'));
  }

  public function loadAdmins()
  {
    $admins = UserProfile::with(
      'gender',
      'userType',
      'userStatus'
    )
      ->where('user_type_id', 3)
      ->get();

    $adminCount = UserProfile::where('user_type_id', 3)->count();

    $response = [
      'admins' => $admins,
      'adminCount' => $adminCount
    ];
    return response()->json($response);
  }

  public function searchAdmins(Request $request)
  {
    $searchQuery = $request->input('query');

    $search = UserProfile::with(
      'gender',
      'userType',
      'userStatus'
    )
      ->where('user_type_id', 3)
      ->where(function ($query) use ($searchQuery) {
        // Search by first name, last name, or full name within the same UserProfile record
        $query->where('fname', 'LIKE', "%{$searchQuery}%")
          ->orWhere('lname', 'LIKE', "%{$searchQuery}%")
          ->orWhere('email', 'LIKE', "%{$searchQuery}%")
          ->orWhere(DB::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$searchQuery}%");
      })
      ->get();

    return response()->json($search);
  }

  public function addAdmin(Request $request)
  {
    $request->validate([
      'fname' => 'required|string|regex:/^[a-zA-Z\s]+$/',
      'lname' => 'required|string|regex:/^[a-zA-Z\s]+$/',
      'bday' => 'required|date|before:today',
      'gender' => 'required',
      'email' => 'required|string|email|unique:user_profiles',
      'country' => 'required|string',
      'city' => 'required|string',
      'address' => 'required|string',
      'cpnum' => 'required|digits:11|starts_with:09|unique:user_profiles,contact_num'
    ], [
      'fname.required' => 'First name is required.',
      'fname.string' => 'First name must be a valid string.',
      'fname.regex' => 'First name can only contain letters and spaces.',

      'lname.required' => 'Last name is required.',
      'lname.string' => 'Last name must be a valid string.',
      'lname.regex' => 'Last name can only contain letters and spaces.',

      'bday.required' => 'Birth date is required.',
      'bday.date' => 'Birth date must be a valid date.',
      'bday.before' => 'Birth date must be a date before today.',

      'gender.required' => 'Gender is required.',

      'email.required' => 'Email is required.',
      'email.string' => 'Email must be a valid string.',
      'email.email' => 'Email must be a valid email address.',
      'email.unique' => 'This email address is already in use.',

      'country.required' => 'Country is required.',
      'country.string' => 'Country must be a valid string.',

      'city.required' => 'City is required.',
      'city.string' => 'City must be a valid string.',

      'address.required' => 'Address is required.',
      'address.string' => 'Address must be a valid string.',

      'cpnum.required' => 'Mobile number is required.',
      'cpnum.digits' => 'Mobile number must be exactly 11 digits long.',
      'cpnum.starts_with' => 'Mobile number must start with "09".',
      'cpnum.unique' => 'This mobile number is already in use.',
    ]);

    $fname = ucwords(strtolower($request->input('fname')));
    $lname = ucwords(strtolower($request->input('lname')));
    $gender = $request->input('gender');
    $bday = $request->input('bday');
    $email = $request->input('email');
    $cpnum = $request->input('cpnum');
    $country = ucwords(strtolower($request->input('country')));
    $city = ucwords(strtolower($request->input('city')));
    $address = ucwords(strtolower($request->input('address')));

    $loggedUser = session('loginId');

    $userProfile = UserProfile::find($loggedUser);

    if (!$userProfile) {
      return back()->with('error', 'Your profile does not exist. Cannot process request.');
    }

    $userType = $userProfile->user_type_id;

    if ($userType !== 4) {
      return back()->with('error', 'You do not have authorization for this operation.');
    }

    $defaultAdminPassword = "scribblesadmin";

    DB::beginTransaction();
    try {
      $userprofile = new UserProfile();
      $userprofile->fname = $fname;
      $userprofile->lname = $lname;
      $userprofile->bday = $bday;
      $userprofile->gender_id = $gender;
      $userprofile->email =  $email;
      $userprofile->country = $country;
      $userprofile->municipality = $city;
      $userprofile->address = $address;
      $userprofile->contact_num = $cpnum;
      $userprofile->user_status_id = 1;
      $userprofile->user_type_id = 3;
      $userprofile->save();

      $password = new Password();
      $password->user_profile_id = $userprofile->id;
      $password->password_hash = Hash::make($defaultAdminPassword);
      $password->is_deleted = 0;
      $password->save();

      $userprofile->sendEmailVerificationNotification();

      DB::commit();

      return redirect()->back()->with('success', 'Admin successfully created!')->with('info', 'Email verification link has been sent to the account email address. Please check email to verify account.');;
    } catch (Exception $e) {
      DB::rollBack();
      throw $e;
    }
  }

  //
}
