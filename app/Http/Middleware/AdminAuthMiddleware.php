<?php

namespace App\Http\Middleware;

use App\Models\Password;
use App\Models\UserProfile;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Session::has('loginId')) {
            // Get the user profile from session
            $userProfile = Session::get('user_profiles');

            // Check if the user has user_type_id == 2
            if ($userProfile->user_type_id == 2) {
                // Redirect to a restricted access page if user_type_id is 2
                return redirect('/tutor-dashboard');
            } else if ($userProfile->user_type_id == 1) {
                return redirect('/parent-dashboard');
            } else if ($userProfile->user_type_id == 4) {
                return redirect('/headadmin-dashboard');
            }


            return $next($request);
        } else {
            $email = $request->adminEmail;
            $password = $request->adminPassword;

            // Search for the user by email in the User_profile table
            $userProfile = UserProfile::where('email', $email)->first();


            if ($userProfile) {
                // Search for the password record using the user profile ID
                $pass = Password::where('user_profile_id', $userProfile->id)
                    ->where('is_deleted', 0)
                    ->first();

                $acccountStatus = $userProfile->user_status_id;
                $userType = $userProfile->user_type_id;

                if($userType < 3){
                    return redirect('/admin-login')->with('error', 'Admin account does not exist.');
                }

                if ($acccountStatus == 2) {
                    return redirect('/admin-login')->with('deactivated', 'Your has been deactivated. Please <a class="link text-decoration-underline" target="_blank" href="' . route('contact') . '">contact an administrator</a> to re-activate your account.');
                }

                if ($pass && Hash::check($password, $pass->password_hash)) {
                    // Store user profile and login ID in the session
                    $request->session()->put('user_profiles', $userProfile);
                    $request->session()->put('loginId', $userProfile->id);

                    $birthdate = $userProfile->bday;
                    $age = Carbon::parse($birthdate)->age;
                    $request->session()->put('age', $age);

                    return $next($request);
                }

                return redirect('/admin-login')->with('error', 'Incorrect Email or Password. Please try again.');
            }
        }
        return redirect('/admin-login')->with('error', 'Your account does not exist.');
    }
}
