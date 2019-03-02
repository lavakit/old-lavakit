<?php

namespace Inspire\Translation\Http\Controllers\Admin;

use Inspire\Base\Http\Controllers\Admin\BaseAdminController;

/**
 * Class TranslationController
 * @package Inspire\Translation\Http\Controllers\Admin
 * @copyright 2019 Inspire Group
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
