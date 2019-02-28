<?php

namespace Inspire\Theme\Services\Breadcrumbs\Manager;

use Illuminate\Routing\Router;
use Illuminate\View\Factory as ViewFactory;
use Inspire\Theme\Services\Breadcrumbs\Exceptions\DuplicateBreadcrumbException;
use Inspire\Theme\Services\Breadcrumbs\Exceptions\InvalidBreadcrumbException;
use Inspire\Theme\Services\Breadcrumbs\Exceptions\UnnamedRouteException;
use Inspire\Theme\Services\Breadcrumbs\Exceptions\ViewNotSetException;
use Inspire\Theme\Services\Breadcrumbs\Foundation\Breadcrumbs as BreadcrumbsContract;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

/**
 * Class BreadcrumbsManager
 * @package Inspire\Theme\Services\Breadcrumbs\Manager
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class BreadcrumbsManager implements BreadcrumbsContract
{
    // When route-bound breadcrumbs are used but the current route doesn't have a name (UnnamedRouteException)
    const UNNAMED = true;

    // When route-bound breadcrumbs are used and the matching breadcrumb doesn't exist (InvalidBreadcrumbException)
    const MISSING_ROUTE = true;

    //When a named breadcrumb is used but doesn't exist (InvalidBreadcrumbException)
    const INVALID_NAMED = true;

    /**
     * @var BreadcrumbsGenerator
     */
    protected $generator;

    /**
     * @var Router
     */
    protected $router;

    /** @var ViewFactory */
    protected $viewFactory;

    /**
     * The registered breadcrumb-generating callbacks.
     *
     * @var array
     */
    protected $callbacks = [];

    /**
     * @var string
     */
    protected $viewName;

    /**
     * BreadcrumbsManager constructor.
     * @param BreadcrumbsGenerator $generator
     * @param RouteCurrent $router
     * @param ViewFactory $viewFactory
     */
    public function __construct(BreadcrumbsGenerator $generator, RouteCurrent $router, ViewFactory $viewFactory)
    {
        $this->generator = $generator;
        $this->router = $router;
        $this->viewFactory = $viewFactory;
    }

    /**
     * Register a breadcrumb-generating callback for a page.
     *
     * @param string $name
     * @param callable $callback
     * @return mixed|void
     * @throws DuplicateBreadcrumbException
     */
    public function register(string $name, callable $callback)
    {
        $this->handler($name, $callback);
    }

    /**
     * Generate a set of breadcrumbs
     *
     * @param string|null $name
     * @param mixed ...$params
     * @return array|Collection|mixed
     * @throws InvalidBreadcrumbException
     * @throws UnnamedRouteException
     */
    public function generate(string $name = null, ...$params)
    {
        $originName = $name;

        // Route-bound breadcrumbs
        if (is_null($name)) {
            try {
                [$name, $params] = $this->router->get();
            } catch (UnnamedRouteException $e) {
                if (self::UNNAMED) {
                    throw $e;
                }

                return new Collection;
            }
        }

        // Generate breadcrumbs
        try {
            return $this->generator->generate($this->callbacks, $name, $params);
        } catch (InvalidBreadcrumbException $e) {
            if (is_null($originName) && self::MISSING_ROUTE) {
                throw $e;
            }

            if (!is_null($originName) && self::INVALID_NAMED) {
                throw $e;
            }

            return new Collection;
        }
    }

    /**
     * @param string $view
     * @param string|null $name
     * @param mixed ...$params
     * @return HtmlString
     * @throws InvalidBreadcrumbException
     * @throws UnnamedRouteException
     */
    public function view(string $view, string $name = null, ...$params)
    {
        $breadcrumbs = $this->generate($name, ...$params);
        $html = $this->viewFactory->make($view, compact('breadcrumbs'))->render();

        return new HtmlString($html);
    }

    /**
     * Render breadcrumbs for a page with the default view
     *
     * @param string|null $name
     * @param mixed ...$params
     * @return HtmlString|mixed
     * @throws InvalidBreadcrumbException
     * @throws UnnamedRouteException
     * @throws ViewNotSetException
     */
    public function render(string $name = null, ...$params)
    {
        if (!$this->viewFactory->exists($this->getView())) {
            throw new ViewNotSetException('Breadcrumbs view not specified (check config/Inspired/breadcrumbs.php)');
        }

        return $this->view($this->getView(), $name, ...$params);
    }

    /**
     * Get the last breadcrumb for the current page.
     *
     * @return mixed
     * @throws InvalidBreadcrumbException
     * @throws UnnamedRouteException
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function current()
    {
        return $this->generate()->where('current', '!==', false)->last();
    }

    /**
     * Set the view of breadcrumbs
     *
     * @param $view
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function setView(string $view = null)
    {
        if (is_null($view)) {
            $view = config('theme.breadcrumbs.view');
        }

        $this->viewName = $view;

        return $this;
    }

    /**
     * @return \Illuminate\Config\Repository|mixed|string
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getView()
    {
        if (!$this->viewName) {
            $this->viewName = config('theme.breadcrumbs.view');
        }

        return $this->viewName;
    }

    /**
     * Register a breadcrumb-generating callback for a page.
     *
     * @param string $name
     * @param callable $callback
     * @throws DuplicateBreadcrumbException
     */
    protected function handler(string $name, callable $callback)
    {
        if (isset($this->callbacks[$name])) {
            throw new DuplicateBreadcrumbException(
                "Breadcrumb name [{$name}] has already been registered"
            );
        }

        $this->callbacks[$name] = $callback;
    }

    /**
     * Set the current route name and parameters to use when calling render()
     *
     * @param string $name
     * @param mixed ...$params
     */
    public function setCurrentRoute(string $name, ...$params): void
    {
        $this->router->set($name, $params);
    }

    /**
     * Clear the previously set route name and parameters to use when calling render()
     *
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function clearCurrentRoute(): void
    {
        $this->router->clear();
    }
}
