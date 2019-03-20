<?php

namespace Lavakit\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 * @package Lavakit\Menu\Models
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Menu extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The data fields for the model clear
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'permalink',
        'kind',
        'status'
    ];
}
