<?php

namespace Lavakit\Base\Composers;

use Illuminate\Contracts\View\View;
use Lavakit\Base\Events\Translations\LoadBackendTranslation;

/**
 * Class TranslationsViewComposer
 * @package Lavakit\Base\Composers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class TranslationsBackendComposer
{
    /**
     * Bind data to the view
     * @param View $view
     */
    public function compose(View $view)
    {
        if (!app('lavakit.isBackend')) {
            return;
        }

        event($textTranslations = new LoadBackendTranslation());

        $view->with('textTranslations', json_encode($textTranslations->getTranslations()));
    }
}
