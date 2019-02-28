<?php

namespace Inspire\Base\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanRegisterFacadeAliases;
use Collective\Html\HtmlServiceProvider;
use Collective\Html\HtmlFacade;
use Collective\Html\FormFacade;

/**
 * Class VendorProvider
 * @package Inspire\Base\Providers
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class VendorProvider extends ServiceProvider
{
    use CanRegisterFacadeAliases;

    /**
     * @var array $facadeAlias
     */
    protected $facadeAlias = [
        'Form' => FormFacade::class,
        'Html' => HtmlFacade::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(HtmlServiceProvider::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacadeAliases($this->facadeAlias);
    }
}
