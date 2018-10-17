<?php

namespace Inspire\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Inspire\Menu\Models\Menu;

/**
 * Class Post
 * @package Inspire\Post\Models
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'title', 'content', 'menu_id', 'is_published'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id')->select(['id', 'is_published']);
    }
}
