<?php

namespace Lavakit\Base\Composers;

use Illuminate\Contracts\View\View;
use Lavakit\Base\Events\Translations\LoadFrontendTranslation;

/**
 * Class TranslationsFrontendComposer
 * @package Lavakit\Base\Composers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class TranslationsFrontendComposer
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

        event($textTranslations = new LoadFrontendTranslation());

        $view->with('textTranslations', json_encode($textTranslations->getTranslations()));
    }
}
