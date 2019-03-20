<?php

namespace Lavakit\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Lavakit\Menu\Models\Menu;

/**
 * Class Post
 * @package Lavakit\Post\Models
 * @copyright 2018 Lavakit Group
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
