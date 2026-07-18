<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class TutorAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('user_profiles')) {
            $userProfile = Session::get('user_profiles');
            
            if ($userProfile->user_type_id == 1) { // Assuming 1 is the admin user type
                return redirect('/parent-dashboard'); // Redirect to a different page if not admin
            }
            if ($userProfile->user_type_id == 3) {
                // Redirect to a restricted access page if user_type_id is 2
                return redirect('/admin-profile');
                
            }
        } else {
            return redirect()->back()->with('Error','No user found'); // Redirect to login if no user profile in session
        }

       
        return $next($request);
    }
}
