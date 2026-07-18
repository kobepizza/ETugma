<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Advertisement;
use App\Models\AdvertisementPriorityStatus;
use App\Models\AdvertisementStatus;
use App\Models\GuardianMain;
use App\Models\Notification;
use App\Models\Subject;
use App\Models\Tutor;
use App\Models\TutorSession;
use App\Models\UserProfile;
use App\Models\UserType;
use App\Models\YearLevel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HeadAdminDashController extends Controller
{
    public function index()
    {
        $userType = UserType::where('id', '!=', 4)->get();
        $adStatus = AdvertisementStatus::all();
        $adPriority = AdvertisementPriorityStatus::all();


        $loggedUserID = session('loginId');
        $userProfile = UserProfile::find($loggedUserID);

        $profilePic = null;

        if ($userProfile && strlen($userProfile->profile_pic) <= 2) {
            $profilePic = 1;
        } else {
            $profilePic = 0;
        }

        return view('head_admin.headadmindash', compact('userType', 'adStatus', 'adPriority', 'profilePic'));
    }

    public function countStats()
    {
        $clientCount = UserProfile::where('user_type_id', 1)->count();
        $tutorCount = UserProfile::where('user_type_id', 2)->count();
        $adminCount = UserProfile::where('user_type_id', 3)->count();
        $verifiedTutorCount = Tutor::where('verification_status_id', 1)->count();

        $activeSessionCount = TutorSession::where('session_status_id', 1)->count();
        $completeSessionCount = TutorSession::where('session_status_id', 2)->count();
        $cancelledSessionCount = TutorSession::where('session_status_id', 3)->count();

        $response = [
            'clientCount' => $clientCount,
            'tutorCount' => $tutorCount,
            'adminCount' => $adminCount,
            'verifiedTutorCount' => $verifiedTutorCount,
            'activeSessionCount' => $activeSessionCount,
            'completeSessionCount' => $completeSessionCount,
            'cancelledSessionCount' => $cancelledSessionCount
        ];

        return response()->json($response);
    }
    public function loadAnnouncements()
    {
        $announcements = Notification::with('userType')
            ->where('notification_type', 3)
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json($announcements);
    }
    public function createAnnouncement(Request $request)
    {
        $loggedUserID = session('loginId');
        $username = session('user_profiles')->fname . ' ' . session('user_profiles')->lname;

        $user_typeID = $request->input('userType');
        $title = $request->input('title');
        $content = $request->input('content');

        // List of user types
        $UserTypes = [
            1 => 'Clients',
            2 => 'Tutors',
            3 => 'Admins',
        ];

        // Input validation
        if (!$user_typeID) {
            return response()->json(['error' => true, 'message' => 'User type is required.'], 422);
        }
        if (!$title) {
            return response()->json(['error' => true, 'message' => 'Title is required.'], 422);
        }
        if (!$content) {
            return response()->json(['error' => true, 'message' => 'Content is required.'], 422);
        }

        DB::beginTransaction();

        try {
            // Check if user_typeID is 4 (send to all user types)
            if ($user_typeID == 4) {
                foreach ($UserTypes as $typeID => $typeName) {

                    $Notif = new Notification();
                    $Notif->user_id = '';
                    $Notif->title = $title;
                    $Notif->author = $username;
                    $Notif->content = $content;
                    $Notif->notification_type = 3;
                    $Notif->user_type = $typeID;
                    $Notif->seen = 0;
                    $Notif->booking_id = 0;
                    $Notif->tutoring_session_id = 0;
                    $Notif->created_at = now()->setTimezone(config('app.timezone'));
                    $Notif->save();

                    // Send the notification via event
                    event(new UserNotification([
                        'user_id' => '',
                        'user_type' => $typeID,
                        'author' => $Notif->author,
                        'title' => 'An admin posted a new announcement',
                        'content' => $Notif->content,
                        'time' => $Notif->created_at,
                        'type' => $Notif->notification_type,
                    ]));
                }


                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => 'Announcement successfully sent to all user types',
                ]);
            } else {

                $Notif = new Notification();
                $Notif->user_id = '';
                $Notif->title = $title;
                $Notif->author = $username;
                $Notif->content = $content;
                $Notif->notification_type = 3;
                $Notif->user_type = $user_typeID;
                $Notif->seen = 0;
                $Notif->booking_id = 0;
                $Notif->tutoring_session_id = 0;
                $Notif->created_at = now()->setTimezone(config('app.timezone'));
                $Notif->save();

                // Send notification
                event(new UserNotification([
                    'user_id' => '',
                    'user_type' => $user_typeID,
                    'author' => $Notif->author,
                    'title' => 'An admin posted a new announcement',
                    'content' => $Notif->content,
                    'time' => $Notif->created_at,
                    'type' => $Notif->notification_type,
                ]));

                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => "Announcement successfully sent to " . $UserTypes[$user_typeID],
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function deleteAnnouncement(Request $request)
    {
        $announcementID = $request->input('announcementID');

        $announcement = Notification::find($announcementID);

        if (!$announcement) {
            return response()->json(['error' => true, 'message' => 'Announcement not found.'], 404);
        }
        if ($announcement->notification_type != 3) {
            return response()->json(['error' => true, 'message' => 'This is not an announcement']);
        }

        DB::beginTransaction();
        $announcement->delete();
        DB::commit();
        return response()->json(['success' => true, 'message' => 'Announcement successfully deleted']);
    }

    public function loadAdvertisements()
    {
        $advertisements = Advertisement::with('advertStatus', 'priorityStatus')->get();
        return response()->json($advertisements);
    }
    public function createAdvertisement(Request $request)
    {
        // Check if user_profiles session exists
        if (!session()->has('user_profiles')) {
            return response()->json(['error' => true, 'message' => 'User profile not found in session.'], 400);
        }
        //dd($request->all());
        // Get user name from session
        $username = session('user_profiles')->fname . ' ' . session('user_profiles')->lname;

        // Input data
        $title = $request->input('title');
        $active_statusID = $request->input('active_status');
        $priority_statusID = $request->input('priority_status');

        // Parse start and end dates using Carbon and set the timezone
        $startDate = Carbon::parse($request->input('startDate'))->setTimezone(config('app.timezone'));
        $endDate = Carbon::parse($request->input('endDate'))->setTimezone(config('app.timezone'));

        // Begin database transaction
        DB::beginTransaction();

        // Create new advertisement
        $advertisement = new Advertisement();
        $advertisement->title = $title;
        $advertisement->author = $username;
        $advertisement->advertisement_status_id = $active_statusID;
        $advertisement->advertisement_priority_status_id = $priority_statusID;
        $advertisement->start_date = $startDate;
        $advertisement->end_date = $endDate;

        // Handle file upload
        if ($request->hasFile('image_upload')) {
            $imageFile = $request->file('image_upload');
            $imageFilename = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = 'Advertisements/';
            $imageFile->move($imagePath, $imageFilename);
            $advertisement->image = $imagePath . $imageFilename;
        }
        // Save the advertisement
        $advertisement->save();

        // Commit the transaction
        DB::commit();
        return response()->json(['success' => true, 'message' => 'Advertisement created successfully.']);
    }

    public function loadEditAdvertisement(Request $request)
    {
        $advertisementID = $request->input('advertID');

        $advertisement = Advertisement::find($advertisementID);

        if (!$advertisement) {
            return response()->json(['error' => true, 'message' => 'Advertisement not found.']);
        }

        return response()->json($advertisement);
    }

    public function updateAdvertisement(Request $request)
    {
       
        // Input data
        $advertID = $request->input('advertID');
        $title = $request->input('title');
        $active_statusID = $request->input('active_status');
        $priority_statusID = $request->input('priority_status');

        // Parse start and end dates using Carbon and set the timezone
        $startDate = Carbon::parse($request->input('startDate'))->setTimezone(config('app.timezone'));
        $endDate = Carbon::parse($request->input('endDate'))->setTimezone(config('app.timezone'));

        $advertisement = Advertisement::find($advertID);

        if(!$advertisement){
            return response()->json(['error' => true, 'message' => 'Advertisement not found.']);
        }

        // Begin database transaction
        DB::beginTransaction();

        $advertisement->title = $title;
        $advertisement->advertisement_status_id = $active_statusID;
        $advertisement->advertisement_priority_status_id = $priority_statusID;
        $advertisement->start_date = $startDate;
        $advertisement->end_date = $endDate;

        // Handle file upload
        if ($request->hasFile('image_upload')) {
            $imageFile = $request->file('image_upload');
            $imageFilename = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = 'Advertisements/';
            $imageFile->move($imagePath, $imageFilename);
            $advertisement->image = $imagePath . $imageFilename;
        }
        // Save the advertisement
        $advertisement->save();

        // Commit the transaction
        DB::commit();
        return response()->json(['success' => true, 'message' => 'Advertisement updated successfully.']);
    }

    public function deleteAdvertisement(Request $request)
    {
        $advertisementID = $request->input('advertID');

        $advertisement = Advertisement::find($advertisementID);

        if (!$advertisement) {
            return response()->json(['error' => true, 'message' => 'Advertisement not found.'], 404);
        }

        DB::beginTransaction();
        $advertisement->delete();
        DB::commit();
        return response()->json(['success' => true, 'message' => 'Advertisement successfully deleted']);
    }
}
