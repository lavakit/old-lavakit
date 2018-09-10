<?php

namespace Inspire\Page\Http\Controllers;

use App\Http\Controllers\Controller;
use Inspire\Theme\Facades\Theme;

class PublicController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('index.index');
    }
}