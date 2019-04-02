<?php

namespace Lavakit\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Composers\LocalesComposer;

/**
 * Class ComposerServiceProvider
 * @package Lavakit\Base\Providers
 * @copyright 2019 LUCY VN
 * @author Pencii Team <hoatq@lucy.ne.jp>
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('setting::admins.fields.originals.select_locale', LocalesComposer::class);
    }
}
