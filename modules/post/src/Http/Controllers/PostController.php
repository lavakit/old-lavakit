<?php

namespace Inspire\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Inspire\Post\Repositories\PostRepository;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $post)
    {
        $this->postRepository =  $post;
    }

    public function index()
    {
        pageTitle()->setTitle('Post');

        $post = $this->postRepository->all();

        echo'<pre>';
        print_r($post->toArray());
        echo'</pre>';

        return view('post::post.index');
    }
}