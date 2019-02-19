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
 * @copyright 2019 LUCY VN
 * @author Pencii Team <hoatq@lucy.ne.jp>
 */
class BreadcrumbsManager implements BreadcrumbsContract
{
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
     * @var array Closures to call before generating breadcrumbs for the current page.
     */
    protected $before = [];

    /**
     * @var array Closures to call after generating breadcrumbs for the current page.
     */
    protected $after = [];

    /**
     * @var array|null The current route name and parameters.
     */
    protected $route;

    /**
     * BreadcrumbsManager constructor.
     * @param BreadcrumbsGenerator $generator
     * @param Router $router
     * @param ViewFactory $viewFactory
     */
    public function __construct(BreadcrumbsGenerator $generator, Router $router, ViewFactory $viewFactory)
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
        $this->for($name, $callback);
    }

    /**
     * Register a closure to call before generating breadcrumbs for the current page.
     *
     * @param callable $callback
     */
    public function before(callable $callback)
    {
        $this->before[] = $callback;
    }

    /**
     * Register a closure to call after generating breadcrumbs for the current page.
     *
     * @param callable $callback
     */
    public function after(callable $callback): void
    {
        $this->after[] = $callback;
    }

    public function exists(string $name = null)
    {
        if (is_null($name)) {
            try {
                [$name] = $this->getCurrentRoute();
            } catch (UnnamedRouteException $e) {
                return false;
            }
        }

        return isset($this->callbacks[$name]);
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
        $origName = $name;

        // Route-bound breadcrumbs
        if ($name === null) {
            try {
                [$name, $params] = $this->getCurrentRoute();
            } catch (UnnamedRouteException $e) {
                if (config('breadcrumbs.unnamed-route-exception')) {
                    throw $e;
                }

                return new Collection;
            }
        }

        // Generate breadcrumbs
        try {
            return $this->generator->generate($this->callbacks, $this->before, $this->after, $name, $params);
        } catch (InvalidBreadcrumbException $e) {
            if ($origName === null && config('breadcrumbs.missing-route-bound-breadcrumb-exception')) {
                throw $e;
            }

            if ($origName !== null && config('breadcrumbs.invalid-named-breadcrumb-exception')) {
                throw $e;
            }

            return new Collection;
        }
    }

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
     * @throws ViewNotSetException
     */
    public function render(string $name = null, ...$params)
    {
        $view = config('theme.breadcrumbs.view');
        if (!$view) {
            throw new ViewNotSetException('Breadcrumbs view not specified (check config/Inspired/breadcrumbs.php)');
        }

        return $this->view($view, $name, ...$params);
    }

    public function current()
    {
        return $this->generate()->where('current', '!==', false)->last();
    }

    /**
     * Set the view of breadcrumbs
     *
     * @param $view
     * @return mixed
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function setView($view)
    {
        // TODO: Implement setView() method.
    }

    /**
     * @param string $name
     * @param callable $callback
     * @throws DuplicateBreadcrumbException
     */
    protected function for(string $name, callable $callback)
    {
        if (isset($this->callbacks[$name])) {
            throw new DuplicateBreadcrumbException(
                "Breadcrumb name \"{$name}\" has already been registered"
            );
        }

        $this->callbacks[$name] = $callback;
    }

    /**
     * @return array|null
     * @throws UnnamedRouteException
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    protected function getCurrentRoute()
    {
        if ($this->route) {
            return $this->route;
        }

        $route = $this->router->current();

        if ($route === null) {
            return ['errors.404', []];
        }

        $name = $route->getName();

        if ($name === null) {
            $uri = array_first($route->methods()) . ' /' . ltrim($route->uri(), '/');
            throw new UnnamedRouteException("The current route ($uri) is not named");
        }

        $params = array_values($route->parameters());
        return [$name, $params];
    }

    public function setCurrentRoute(string $name, ...$params): void
    {
        $this->route = [$name, $params];
    }

    public function clearCurrentRoute(): void
    {
        $this->route = null;
    }
}
