<?php

namespace Inspire\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Inspire\Base\Supports\PageTitle;

class PageTitleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PageTitle::class;
    }
}
