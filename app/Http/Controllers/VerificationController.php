<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    public function verify(Request $request, $id, $hash)
    {
        // Verify the user's email address
        $user = UserProfile::find($id);

        if (!$user || !hash_equals($hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('login')->with('error', 'Invalid verification link');
        }

        $user->markEmailAsVerified();

        return redirect()->route('login')->with('success', 'Email address verified successfully');
    }
    */

    public function verifyEmail($id, $hash)
    {
        $user = UserProfile::find($id);

        if (!$user || !hash_equals($hash, sha1($user->email))) {
            return redirect()->route('login')->with('error', 'Invalid or expired verification link.');
        }

        // Update the email verification fields
        $user->email_verify = 1;
        $user->email_verified_at = now();
        $user->save();


    if (session()->has('clientMain')) {
            return redirect()->route('parent.dashboard')->with('success', 'Your email has been verified successfully.');
        }
    else if (session()->has('tutorMain')){
        return redirect()->route('tutor.dashboard')->with('success', 'Your email has been verified successfully.');
    }
    else if(session()->has('adminMain')){
        return redirect()->route('admin.profile')->with('success', 'Your email has been verified successfully.');
    }
    else if(session()->has('headAdminMain')){
        return redirect()->route('headAdmin.dashboard')->with('success', 'Your email has been verified successfully.');
    }
    
        
        return redirect()->route('login')->with('success', 'Your email has been verified successfully.');
    }
}
