<?php

namespace Lavakit\Base\Traits;

/**
 * Trait CanRegisterViewComposer
 * @package Lavakit\Base\Traits
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
trait CanRegisterViewComposer
{
    /**
     * Register the view composer
     *
     * @param $view
     * @param string $contract
     */
    public function registerViewComposer($view, string $contract)
    {
        if (is_string($view)) {
            $view = [$view];
        }

        if (!class_exists($contract)) {
            return;
        }

        view()->composer($view, $contract);
    }
}
