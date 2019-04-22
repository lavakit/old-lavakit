<?php

namespace Lavakit\User\Models;

use Illuminate\Foundation\Auth\User as Authentication;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package Lavakit\User\Models
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class User extends Authentication
{
    use HasApiTokens;

    /**
     * The table associated with the model
     *
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
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function setFullNameAttribute()
    {
        $this->attributes['full_name'] = ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }
}
