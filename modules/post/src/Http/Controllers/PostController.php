<?php

namespace Inspire\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Inspire\Post\Repositories\PostRepository;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostRepository $post)
    {
        $this->post =  $post;
    }

    public function index()
    {
        $post = $this->post->all(['menu'])->toArray();
        echo'<pre>';
            print_r($post);
        echo'</pre>';
        foreach ($post as $po) {
            echo $po['title'];
            echo '-';
            echo $po['menu']['id'];
            echo'<hr />';
        }
        /*
        pageTitle()->setTitle('Post');

        $post = $this->post->all();

        echo'<pre>';
        print_r($post->toArray());
        echo'</pre>';

        return view('post::post.index');
        */
    }
}
