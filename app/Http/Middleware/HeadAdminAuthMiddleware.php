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

class HeadAdminAuthMiddleware
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


            if($userProfile->user_type_id == 3){
                return redirect('/admin-profile');
            }

            
            return $next($request);
            
        } else {
            return redirect()->back()->with('Error','No user found'); // Redirect to login if no user profile in session
        }
       
    }
}
