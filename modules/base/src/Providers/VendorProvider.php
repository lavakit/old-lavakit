<?php

namespace Lavakit\Base\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
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
        /*
         |--------------------------------------------------------------------------------------------
         | Import when environment local
         |--------------------------------------------------------------------------------------------
        */
        if ($this->app->environment() == 'local') {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        /*
         |--------------------------------------------------------------------------------------------
         | Password passport
         |--------------------------------------------------------------------------------------------
        */
        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addDay(15));
        Passport::refreshTokensExpireIn(Carbon::now()->addDay(30));
        Passport::pruneRevokedTokens();
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
