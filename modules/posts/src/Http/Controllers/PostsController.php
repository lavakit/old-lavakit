<?php

namespace Inspire\Posts\Http\Controllers;

use App\Http\Controllers\Controller;
use Inspire\Posts\Repositories\PostsRepository;

class PostsController extends Controller
{
    protected $postsRepository;

    public function __construct(PostsRepository $posts)
    {
        $this->postsRepository =  $posts;
    }

    public function index()
    {
        pageTitle()->setTitle('Posts');

        $posts = $this->postsRepository->all();

        echo'<pre>';
            print_r($posts->toArray());
        echo'</pre>';

        return view('posts::posts.index');
    }
}