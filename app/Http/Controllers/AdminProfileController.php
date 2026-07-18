<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\EducationLevel;
use App\Models\EmploymentType;
use App\Models\GuardianMain;
use App\Models\Notification;
use App\Models\Password;
use App\Models\SessionTypes;
use App\Models\Tutor;
use App\Models\TutorMain;
use App\Models\UserProfile;
use App\Models\UserStatus;
use App\Models\VerificationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminProfileController extends Controller
{
  //dashboard
  public function index()
  {
    $loggedUserID = session('loginId');

    $userProfile = UserProfile::find($loggedUserID);
    $passwordTable = Password::where('user_profile_id', $loggedUserID)->first();
    $hashedPassword = $passwordTable->password_hash;


    $profilePic = null;
    $password = null;
    $defaultAdminPass = "scribblesadmin";

    if (Hash::check($defaultAdminPass, $hashedPassword)) {
      $password = 1;
    } else {
      $password = 0;
    }

    if ($userProfile && strlen($userProfile->profile_pic) <= 2) {
      $profilePic = 1;
    } else {
      $profilePic = 0;
    }

    return view('admin.admindash', compact('userProfile', 'profilePic', 'password'));
  }

  public function loadStats()
  {
    $unverified = Tutor::where('verification_status_id', 2)->count();
    $verified = Tutor::where('verification_status_id', 1)->count();
    $declined = Tutor::where('verification_status_id', 3)->count();

    $response = [
      'unverified' => $unverified,
      'verified' => $verified,
      'declined' => $declined
    ];
    return response()->json($response);
  }
  //

  //profile
  public function profile()
  {
    //dd(Session::all());
    $userId = session('user_profiles')->id;

    $profile = UserProfile::where('id', $userId)->get('profile_pic')
      ->first();


    return view('admin.adminprofile', compact('profile'));
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
  //

  //tutors
  public function adminTutor()
  {

    $userStatus = UserStatus::all();
    $education = EducationLevel::all();
    $employment = EmploymentType::all();
    $session = SessionTypes::all();
    $verification = VerificationStatus::all();

    return view('admin.admintutors', compact('userStatus', 'education', 'employment', 'session', 'verification'));
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

  public function viewSearchTutors(Request $request)
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

  //parents
  public function adminParent()
  {
    $userStatus = UserStatus::all();

    return view('admin.adminclients', compact('userStatus'));
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

  //verification
  public function adminVerification()
  {
    $employment = EmploymentType::all();
    $education = EducationLevel::all();
    $session = SessionTypes::all();

    return view('admin.adminverify', compact('employment', 'education', 'session'));
  }

  public function loadApplicants()
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

    ])
      ->whereHas('tutor', function ($query) {
        $query->where('verification_status_id', '>=', 2);
      })
      ->get();

    $verifiedCount = Tutor::where('verification_status_id', 1)->count();


    return response()->json([
      'data' => $tutorMain,
      'count' => $verifiedCount
    ]);
  }

  public function loadRequirements(Request $request)
  {
    $tutirmainID = $request->input('tutorMainId');

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

    ])
      ->find($tutirmainID);

    return response()->json($tutorMain);
  }

  public function verifyTutor(Request $request)
  {
    $tutorid = $request->input('verify_tutor_id');
    $senderId = session('loginId');

    $tutor = Tutor::find($tutorid);
    $user = UserProfile::find($senderId);
    $username = "$user->fname $user->lname";
    //dd($request->all());
    if (!$tutor) {
      return response()->json(['error' => true, 'message' => 'Tutor not found'], 404);
    }

    $receiverId = $tutor->user_profile_id;

    if (!$receiverId) {
      return response()->json(['error' => true, 'message' => 'User not found'], 404);
    }

    if ($tutor && $receiverId && $tutor->verification_status_id >= 2) {
      DB::beginTransaction();

      $tutor->verification_status_id = 1;
      $tutor->save();

      $Notif = new Notification();
      $Notif->user_id = $receiverId;
      $Notif->title = "An admin has verified your account";
      $Notif->author = $username;
      $Notif->content = "Your account has been successfully verified, you may now accept clients.";
      $Notif->notification_type = 1;
      $Notif->user_type = 2;
      $Notif->seen = 0;
      $Notif->booking_id = 0;
      $Notif->tutoring_session_id = 0;
      $Notif->created_at = now()->setTimezone(config('app.timezone'));
      $Notif->save();

      DB::commit();

      //send notification
      event(new UserNotification([
        'user_id' => $receiverId,
        'user_type' => '',
        'author' => $Notif->author,
        'title' => $Notif->title,
        'content' => $Notif->content,
        'time' => $Notif->created_at,
        'type' => $Notif->notification_type
      ]));

      return response()->json(['success' => true, 'message' => 'Tutor verified successfully']);
    } else {
      return response()->json(['error' => true, 'message' => 'Tutor already verified']);
    }
  }

  public function declineTutor(Request $request)
  {
    $tutorid = $request->input('decline_tutor_id');
    $reason = $request->input('reason');
    $senderId = session('loginId');

    $tutor = Tutor::find($tutorid);
    $user = UserProfile::find($senderId);
    $username = "$user->fname $user->lname";
    //dd($request->all());
    if (!$tutor) {
      return response()->json(['error' => true, 'message' => 'Tutor not found'], 404);
    }

    $receiverId = $tutor->user_profile_id;

    if (!$receiverId) {
      return response()->json(['error' => true, 'message' => 'User not found'], 404);
    }

    if ($tutor && $receiverId && $tutor->verification_status_id == 2) {
      DB::beginTransaction();

      $tutor->verification_status_id = 3;
      $tutor->save();

      $Notif = new Notification();
      $Notif->user_id = $receiverId;
      $Notif->title = "An admin has declined your verification";
      $Notif->author = $username;
      $Notif->content = "<span class='fw-bold'>Reason for declining:</span><br><br>$reason";
      $Notif->notification_type = 1;
      $Notif->user_type = 2;
      $Notif->seen = 0;
      $Notif->booking_id = 0;
      $Notif->tutoring_session_id = 0;
      $Notif->created_at = now()->setTimezone(config('app.timezone'));
      $Notif->save();

      DB::commit();

      //send notification
      event(new UserNotification([
        'user_id' => $receiverId,
        'user_type' => '',
        'author' => $Notif->author,
        'title' => $Notif->title,
        'content' => $Notif->content,
        'time' => $Notif->created_at,
        'type' => $Notif->notification_type
      ]));

      return response()->json(['success' => true, 'message' => 'Tutor declined successfully']);
    } else {
      return response()->json(['error' => true, 'message' => 'Tutor already declined']);
    }
  }

  public function messageTutor(Request $request)
  {

    $tutorid = $request->input('message_tutor_id');
    $message = $request->input('message_content');
    $senderId = session('loginId');

    if (!$message || $message == '') {
      return response()->json(['error' => true, 'message' => 'Message cannot be empty']);
    }

    $tutor = Tutor::find($tutorid);
    $user = UserProfile::find($senderId);
    $username = "$user->fname $user->lname";

    if (!$tutor) {
      return response()->json(['error' => true, 'message' => 'Tutor not found'], 404);
    }

    $receiverId = $tutor->user_profile_id;

    if (!$receiverId) {
      return response()->json(['error' => true, 'message' => 'User not found'], 404);
    }

    if ($tutor && $receiverId && $message) {
      DB::beginTransaction();

      $Notif = new Notification();
      $Notif->user_id = $receiverId;
      $Notif->title = "An admin sent you a message about your verification";
      $Notif->author = $username;
      $Notif->content = "<span class='fw-bold'>Message: </span><br><br>$message";
      $Notif->notification_type = 1;
      $Notif->user_type = 2;
      $Notif->seen = 0;
      $Notif->booking_id = 0;
      $Notif->tutoring_session_id = 0;
      $Notif->created_at = now()->setTimezone(config('app.timezone'));
      $Notif->save();

      DB::commit();

      //send notification
      event(new UserNotification([
        'user_id' => $receiverId,
        'user_type' => '',
        'author' => $Notif->author,
        'title' => $Notif->title,
        'content' => $Notif->content,
        'time' => $Notif->created_at,
        'type' => $Notif->notification_type
      ]));

      return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
    } else {
      return response()->json(['error' => true, 'message' => 'Cannot send message.']);
    }
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
      ->whereHas('tutor', function ($query) {
        $query->where('verification_status_id', '>=', 2);
      })
      ->where(function ($query) use ($searchQuery) {
        // Search by child's first or last name or their full name
        $query->whereHas('tutor.userProfile', function ($q) use ($searchQuery) {
          $q->where('fname', 'LIKE', "%{$searchQuery}%")
            ->orWhere('lname', 'LIKE', "%{$searchQuery}%")
            ->orWhere(DB::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$searchQuery}%");
        });
      })
      ->get();

    return response()->json($search);
  }
}
