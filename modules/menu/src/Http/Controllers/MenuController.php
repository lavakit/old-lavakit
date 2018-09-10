<?php

namespace Inspire\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Inspire\Menu\Repositories\MenuRepository;

class MenuController extends Controller
{
    protected $menu;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menu = $menuRepository;
    }

    public function index()
    {
        $menu = $this->menu->all(['post'])->toArray();
        echo'<pre>';
        print_r($menu);
        echo'</pre>';
    }

}
