<?php

namespace Lavakit\Setting\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package Lavakit\Setting\Models
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Setting extends Model
{
    use Translatable;

    public $translatedAttributes = ['value', 'description'];

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'settings';

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
    protected $fillable = ['name', 'value', 'description', 'plain_value', 'is_translatable'];
}
