<?php

namespace Lavakit\Theme\Services\Breadcrumbs\Foundation;

/**
 * Interface Breadcrumbs
 * @package Lavakit\Theme\Services\Breadcrumbs\Foundation
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
interface Breadcrumbs
{
    /**
     * Register a breadcrumb-generating callback for a page.
     *
     * @param string $name
     * @param callable $callback
     * @return mixed
     */
    public function register(string $name, callable $callback);

    /**
     * Generate a set of breadcrumbs
     *
     * @param string|null $name
     * @param array ...$params
     * @return mixed
     */
    public function generate(string $name = null, ...$params);

    /**
     * Render breadcrumbs for a page with the default view
     *
     * @param string|null $name
     * @param array ...$params
     * @return mixed
     */
    public function render(string $name = null, ...$params);

    /**
     * Get the last breadcrumb for the current page.
     *
     * @return mixed
     */
    public function current();

    /**
     * Set the view of breadcrumbs
     *
     * @param $view
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function setView(string $view);
}
