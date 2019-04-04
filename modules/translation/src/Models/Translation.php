<?php

namespace Lavakit\Translation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Translation
 * @package Lavakit\Translation\Models
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Translation extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'translations';

    /**
     * The data files for the model clear
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The attribute that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'module',
        'file',
        'key'
    ];
}
