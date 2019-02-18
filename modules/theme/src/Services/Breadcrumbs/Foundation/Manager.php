<?php

namespace Inspire\Theme\Services\Breadcrumbs\Foundation;

/**
 * Interface Manager
 * @package Inspire\Theme\Services\Breadcrumbs\Foundation
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
interface Manager
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
     * Set the view of breadcrumbs
     *
     * @param $view
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function setView($view);
}
