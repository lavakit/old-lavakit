<?php

namespace Inspire\Posts\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'content', 'is_published'
    ];
}