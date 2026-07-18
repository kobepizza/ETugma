<?php

namespace App\Models;

use App\Mail\EmailVerification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;


class UserProfile extends Model implements CanResetPasswordInterface, MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use CanResetPassword;

    protected $table= 'user_profiles';
    protected $fillable = ['user_status_id','profile_pic'];

    
    public function userType(){
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function userStatus(){
        return $this->belongsTo(UserStatus::class, 'user_status_id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    
    public function guardian(){
        return $this->hasMany(UserProfile::class, 'user_profile_id');
    }

    public function password(){
        return $this->hasOne(Password::class, 'user_profile_id');
    }
    
    public function tutor(){
        return $this->hasMany(Tutor::class, 'user_profile_id');
    }

    public function getEmailForVerification()
    {
        return $this->email;
    }
    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        return ! is_null($this->email_verified_at);
    }
    /**
     * Mark the given user's email as verified.
     *
     * @return void
     */
    public function markEmailAsVerified()
    {
        $this->email_verified_at = now();
        $this->save();
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        // You can use Laravel's notification system to send the verification email
        // For example:
        //$this->notify(new VerifyEmail);


        $verificationUrl = route('verify.email', ['id' => $this->id, 'hash' => sha1($this->email)]);

        Mail::to($this->email)->send(new EmailVerification($this, $verificationUrl));
    }

    public function userSender(){
        return $this->hasMany(Chat::class, 'sender_id','id');
    }
    public function userReceiver(){
        return $this->hasMany(Chat::class, 'receiver_id','id');
    }
}
