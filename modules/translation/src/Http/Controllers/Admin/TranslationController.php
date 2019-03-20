<?php

namespace Lavakit\Translation\Http\Controllers\Admin;

use Lavakit\Base\Http\Controllers\Admin\BaseAdminController;

/**
 * Class TranslationController
 * @package Lavakit\Translation\Http\Controllers\Admin
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class TranslationController extends BaseAdminController
{
    /**
     * @var string
     */
    protected $module = 'translation';

    /**
     * TranslationController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
