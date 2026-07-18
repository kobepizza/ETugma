<?php

namespace App\Http\Controllers;

use App\Models\Password as ModelsPassword;
use App\Models\UserProfile;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('guest.forgot-password');
    }

    public function passwordEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email','exists:user_profiles,email']
        ],[
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.exists' => 'Account does not exist'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset(Request $request, string $token)
    {
        $email = $request->query('email');
        return view('guest.reset-password', ['token' => $token, 'email' => $email]);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/']
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (UserProfile $user, string $password) {


                $passwordRecord = ModelsPassword::where('user_profile_id', $user->id)->first();

                $passwordRecord->forceFill([
                    'password_hash' => Hash::make($password)
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
