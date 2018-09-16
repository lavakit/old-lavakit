<?php

namespace Inspire\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Inspire\Menu\Repositories\MenuRepository;

/**
 * Class MenuController
 * @package Inspire\Menu\Http\Controllers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class MenuController extends Controller
{
    protected $menu;

    /**
     * MenuController constructor.
     * @param MenuRepository $menuRepository
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menu = $menuRepository;
    }

    /**
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function index()
    {
        return __CLASS__;
    }
}
