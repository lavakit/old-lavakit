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
        return view('posts::posts.index');

//        $posts = $this->postsRepository->getAll()->toArray();
//        echo'<pre>';
//        print_r($posts);
//        echo'</pre>';
    }
}