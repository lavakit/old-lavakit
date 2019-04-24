<?php

namespace Lavakit\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;

/**
 * Class VendorProvider
 * @package Lavakit\Base\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class VendorProvider extends ServiceProvider
{
    use CanRegisterFacadeAliases;

    /**
     * @var array $facadeAlias
     */
    protected $facadeAlias = [];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
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
