<?php

namespace Lavakit\Setting\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SettingTranslation
 * @package Lavakit\Setting\Models
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingTranslation extends Model
{
    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'setting_translations';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['value', 'description'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
