<?php

namespace Inspire\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Inspire\Post\Models\Post;

/**
 * Class Menu
 * @package Inspire\Menu\Models
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'name', 'is_published'
    ];

    public function post()
    {
        return $this->hasMany(Post::class)->select(['title','menu_id']);
    }
}