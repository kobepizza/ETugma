<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Middleware\CustomAuthMiddleware;
use App\Http\Middleware\HeadAdminAuthMiddleware;
use App\Models\Guardian;
use App\Models\GuardianMain;
use App\Models\Tutor;
use App\Models\TutorMain;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (session('clientMain')) {
            return redirect()->route('parent.dashboard'); // Redirect to your dashboard route
        } else if (session('tutorMain')) {
            return redirect()->route('tutor.dashboard');
        } else {
            return view('guest.login');
        }

        // Show login view if no session is running

    }


    public function sendLogin(Request $request)
    {
        $middleware = new CustomAuthMiddleware();
    
        $response = $middleware->handle($request, function ($request) {
            // Validate login input
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
    
            $userProfile = session('user_profiles');
            $loginId = session('loginId');
    
            // Fetch Guardian and Tutor data
            $guardian = Guardian::where('user_profile_id', $userProfile->id)->first();
            $tutor = Tutor::where('user_profile_id', $userProfile->id)->first();
    
            $clientMain = null;
            $tutorMain = null;
            
            //remember me 
            $rememberCookie = $request->has('rememberCookie');

            if ($rememberCookie) {
                // Store the email and password in cookies (make sure to secure the password)
                Cookie::queue('remember_email', $request->input('email'), 60 * 24 * 7); // Store for 7 days
                Cookie::queue('remember_password', $request->input('password'), 60 * 24 * 7); // Store for 7 days
            } else {
                // Forget the cookies if "Remember Me" is not checked
                Cookie::queue(Cookie::forget('remember_email'));
                Cookie::queue(Cookie::forget('remember_password'));
            }
            //
    
            if ($guardian) {
                $guardianId = $guardian->id;
                $clientMain = GuardianMain::with(['guardian.userProfile',
                    'guardian.userProfile.gender', 'guardian.userProfile.userType',
                    'guardian.userProfile.userStatus', 'guardian.relation',
                    'child.gender', 'child.yearLevel',
                    'preferenceLanguage.preference.teachingStyle',
                    'preferenceLanguage.preference.modality',
                    'preferenceLanguage.preference.availability',
                    'preferenceLanguage.language'])
                    ->where('guardian_id', $guardianId)->first();
            } else if ($tutor) {
                $tutorId = $tutor->id;
                $tutorMain = TutorMain::with(['tutor.userProfile',
                    'tutor.userProfile.gender', 'tutor.userProfile.userStatus',
                    'tutor.userProfile.userType', 'tutor.employmentSession',
                    'tutor.employmentSession.sessionType', 'tutor.verificationStatus',
                    'tutor.employmentSession.employmentType', 'educationLevel',
                    'requirement', 'preferenceLanguage.language',
                    'preferenceLanguage.preference.teachingStyle',
                    'preferenceLanguage.preference.modality',
                    'preferenceLanguage.preference.availability',
                    'departmentYearSubject.department', 'departmentYearSubject.subject',
                    'departmentYearSubject.gradeLevel'])
                    ->where('tutor_id', $tutorId)->first();
            }
    
            // If neither tutorMain nor clientMain exists, log out and redirect with error message
            if (!$tutorMain && !$clientMain) {
                if (Session::has('loginId')) {
                    $request->session()->flush();
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
    
                    return redirect()->route('login')->with('error', 'Login failed. No valid profile found. Please try again.');
                }
    
                return redirect()->route('login')->with('error', 'Login failed. No valid profile found. Please try again.');
            }
    
            // Put tutorMain or clientMain in session if they exist
            //dd(session('loginId'));
            $verifyUser = UserProfile::where('id', session('loginId'))->first();
            //dd($verifyUser);
    
    
            if ($verifyUser->email_verify == 1) {
                if ($tutorMain) {
                    $request->session()->put('tutorMain', $tutorMain);
                } else if ($clientMain) {
                    $request->session()->put('clientMain', $clientMain);
                }
            }
            else
            {
                $request->session()->flush();
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
    
                return redirect()->route('login')->with('error', 'Email is not verified, please check your email to verify your account');
            }
    
            // Redirect with success message
            return redirect()->route('parent.dashboard')->with('success', 'Logged in successfully!');
        });
    
        return $response;
    }

    //ADmin login

    public function adminIndex(Request $request)
    {
        if (session('adminMain')) {
            return redirect()->route('admin.dashboard'); // Redirect to your dashboard route
        } else if (session('headAdminMain')) {
            return redirect()->route('headAdmin.dashboard');
        } else {
            return view('admin.adminlogin');
        }
    }

    public function adminLogin(Request $request){
        $middleware = new AdminAuthMiddleware();

        $response = $middleware->handle($request, function($request){
            //putting userProfile in session
           
            $request->validate([
                'adminEmail' => 'required|email',
                'adminPassword' => 'required|min:8',
            ]);
            $userProfile = session('user_profiles');
            $loginId = session('loginId');
            
            //remember me 
            $rememberCookie = $request->has('rememberCookie');

            if ($rememberCookie) {
                // Store the email and password in cookies (make sure to secure the password)
                Cookie::queue('remember_email', $request->input('adminEmail'), 60 * 24 * 7); // Store for 7 days
                Cookie::queue('remember_password', $request->input('adminPassword'), 60 * 24 * 7); // Store for 7 days
            } else {
                // Forget the cookies if "Remember Me" is not checked
                Cookie::queue(Cookie::forget('remember_email'));
                Cookie::queue(Cookie::forget('remember_password'));
            }
            //


            $admin = UserProfile::with('gender','userStatus','userType')
            ->where('id',$loginId)
            ->where('user_type_id', 3)
            ->first();

            $headAdmin = UserProfile::with('gender','userStatus','userType')
            ->where('id',$loginId)
            ->where('user_type_id', 4)
            ->first();


            $verifyUser = UserProfile::where('id', $loginId)->first();


            if ($verifyUser->email_verify == 1) {

            if($admin){
                $request->session()->put('adminMain', $admin);
                
                return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully!');
            }

            else if($headAdmin){
                $request->session()->put('headAdminMain', $headAdmin);
                
                return redirect()->route('headAdmin.dashboard')->with('success', 'Logged in successfully!');
            }
            if(!$admin && !$headAdmin) {
                if(Session::has('loginId')){
                    $request->session()->flush();
        
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
        
                    return redirect()->route('admin.login')->with('error', 'Login failed. Please try again.');
                };
                return redirect()->route('admin.login')->with('error', 'Login failed. Please try again.');
            }
        }else{
            $request->session()->flush();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'Email is not verified');
        }

                        
    });
        return $response;
    }

    //headAdmin Login
    public function headAdminLogin(Request $request)
    {
        $middleware = new HeadAdminAuthMiddleware();

        $response = $middleware->handle($request, function ($request) {
            //putting userProfile in session

            $request->validate([
                'adminEmail' => 'required|email',
                'adminPassword' => 'required|min:8',
            ]);
            $userProfile = session('user_profiles');
            $loginId = session('loginId');

            //remember me 
            $rememberCookie = $request->has('rememberCookie');

            if ($rememberCookie) {
                // Store the email and password in cookies (make sure to secure the password)
                Cookie::queue('remember_email', $request->input('adminEmail'), 60 * 24 * 7); // Store for 7 days
                Cookie::queue('remember_password', $request->input('adminPassword'), 60 * 24 * 7); // Store for 7 days
            } else {
                // Forget the cookies if "Remember Me" is not checked
                Cookie::queue(Cookie::forget('remember_email'));
                Cookie::queue(Cookie::forget('remember_password'));
            }
            //

            $headAdmin = UserProfile::with('gender', 'userStatus', 'userType')
                ->where('id', $loginId)
                ->first();


            if ($headAdmin) {
                $request->session()->put('headAdminMain', $headAdmin);
            }

            return redirect()->route('headAdmin.dashboard')->with('success', 'Logged in successfully!');
        });
        return $response;
    }


    public function logout(Request $request)
    {

        if (Session::has('loginId')) {
            $request->session()->flush();

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            redirect()->route('login');
        };
        return redirect()->route('login');
    }

    public function adminLogout(Request $request)
    {

        if (Session::has('loginId')) {
            $request->session()->flush();

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            redirect()->route('admin.login');
        };
        return redirect()->route('admin.login');
    }
}
