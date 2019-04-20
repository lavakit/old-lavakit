<?php

namespace Lavakit\Base\Composers;

use Illuminate\Contracts\View\View;
use Lavakit\Base\Events\Translations\LoadAuthTranslation;

/**
 * Class TranslationsAuthComposer
 * @package Lavakit\Base\Composers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class TranslationsAuthComposer
{
    /**
     * Bind data to the view
     * @param View $view
     */
    public function compose(View $view)
    {
        if (!app('lavakit.isPageAuth')) {
            return;
        }

        event($textTranslations = new LoadAuthTranslation());

        $view->with('textTranslations', json_encode($textTranslations->getTranslations()));
    }
}
