<?php

namespace Lavakit\Base\Traits;

/**
 * Trait CanOverrideConfigurationPackages
 * @package Lavakit\Base\Traits
 */
trait CanOverrideConfigurationPackages
{
    public function overwriteConfigurationPackages()
    {
        $this->auth();
        $this->swagger();
    }

    protected function auth()
    {
        $this->app->config->set('auth.providers.users.driver', 'eloquent');
        $this->app->config->set('auth.providers.users.model', \Lavakit\User\Models\User::class);
    }

    protected function swagger()
    {
        $this->app->config->set('l5-swagger.paths.annotations', base_path('modules'));
        $this->app->config->set('l5-swagger.constants.APP_NAME', env('APP_NAME', 'Lavakit'));
        $this->app->config->set('l5-swagger.constants.L5_SWAGGER_CONST_HOST', env('APP_URL', 'localhost:8000'));
    }
}
