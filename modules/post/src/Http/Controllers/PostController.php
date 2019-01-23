<?php

namespace Inspire\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Inspire\Post\Repositories\PostRepository;

/**
 * Class PostController
 * @package Inspire\Post\Http\Controllers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class PostController extends Controller
{
    protected $post;

    /**
     * PostController constructor.
     * @param PostRepository $post
     */
    public function __construct(PostRepository $post)
    {
        $this->post =  $post;
    }

    /**
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function index()
    {
        return __CLASS__;
        /*
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
        */
        /*
        title()->set('Post');

        $post = $this->post->all();

        echo'<pre>';
        print_r($post->toArray());
        echo'</pre>';

        return view('post::post.index');
        */
    }
}
