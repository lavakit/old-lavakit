<?php

namespace Inspire\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Inspire\Menu\Models\Menu;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'title', 'content', 'menu_id', 'is_published'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'menu_id')->select(['id','is_published']);
}
}