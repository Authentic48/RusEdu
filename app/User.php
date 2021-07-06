<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordReset;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Role;
use App\TeacherProfile;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
      * The password reset token.
      *
      * @var string
      */
    public $token;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute()
    {
     return $this->profile_image; 
    }
    
    public function roles()
    {
     return $this->belongsToMany('App\Role');
    }

     public function hasAnyRole($role)
     {
     return null !== $this->roles()->where('name', $role)->first();
     }

    public function schoolReview()
    {
      return $this->hasMany('App\schoolReview');
    }
    public function teacherProfile()
    {
      return $this->hasOne('App\TeacherProfile');
    }

    public function hasTeacherProfile($user_id)
    {
      return null !== $this->teacherProfile()->where('user_id', $user_id)->first();
    }

    

    public function school()
    {
       return $this->hasOne('App\SchoolProfile');
    }

    public function hasSchoolProfile($user_id)
    {
      return null !== $this->school()->where('user_id', $user_id)->first();
    }

    public function post()
    {
       return $this->hasMany('App\StudentPost');
    }

    public function job()
    {
       return $this->hasMany('App\Job');
    }


    public function programs()
    {
        return $this->hasMany('App\Program');
    }

    /**
      * Send the password reset notification.
      *
      * @param  string  $token
      * @return void
      */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

    /**
      * Send the email verification notification.
      *
      * @return void
      */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail); // my notification
    }
     
}
