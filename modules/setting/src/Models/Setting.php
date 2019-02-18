<?php

namespace Inspire\Setting\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package Inspire\Setting\Models
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Setting extends Model
{
    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * The attribute that should be hidden for arrays
     *
     * @var array
     */
    protected $hidden = [
        'package',
        'module',
        'control',
        'key',
        'name',
        'value',
        'options',
        'is_admin',
    ];

    /**
     * The data fields for the model clear
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'value'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];
}
