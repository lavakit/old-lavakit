<?php

namespace Inspire\User\Models;

use Illuminate\Foundation\Auth\User as Authentication;
use Email;

/**
 * Class User
 * @package Inspire\User\Models
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class User extends Authentication
{
    /**
     * The database fields for the model clear
     * @var string
     */
    protected $table = 'users';

    /**
     * The data fields for the model clear
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'confirm_token', 'remember_token'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'email',
        'password',
        'confirmed',
        'registered',
        'confirm_token',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'confirmed'  => 'boolean',
        'registered' => 'boolean'
    ];

    /**
     * Set the user's password is hash.
     *
     * @param $value
     * @copyright 2018 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return string
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function setFullNameAttribute()
    {
        $this->attributes['full_name'] = ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    /**
     * @param string $token
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function sendPasswordResetNotification($token)
    {
        $emailReset = $this->getEmailForPasswordReset();

        $subject = 'Reset Password Notification';
        $body = 'You are receiving this email because we received a password reset request for your account.';
        $args = [
            'to' => $emailReset,
            'name' => 'GET NAME',
            'btn_link' => route('password.reset', ['email' => base64_encode($emailReset), 'token' => $token]),
            'btn_name' => trans('user::auth.html.btn.forgot')
        ];

        Email::send($subject, $body, $args);
    }
}
