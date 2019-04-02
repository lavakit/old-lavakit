<?php

namespace Lavakit\Base\Composers;

use Illuminate\Contracts\View\View;

/**
 * Class LocalesComposer
 * @package Lavakit\Base\Composers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class LocalesComposer
{
    /**
     * Bind data to the view
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('locales', config('base.available_locales'));
    }
}
