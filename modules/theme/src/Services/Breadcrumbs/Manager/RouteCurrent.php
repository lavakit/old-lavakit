<?php

namespace Lavakit\Theme\Services\Breadcrumbs\Manager;

use Lavakit\Theme\Services\Breadcrumbs\Exceptions\UnnamedRouteException;
use Illuminate\Routing\Router;

/**
 * Class RouteCurrent
 * @package Lavakit\Theme\Services\Breadcrumbs\Manager
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class RouteCurrent
{
    /**
     * The current route name and parameters.
     *
     * @var array | null
     */
    protected $route;

    /**
     * @var Router
     */
    protected $router;

    /**
     * RouteCurrent constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @return array|null
     * @throws UnnamedRouteException
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function get()
    {
        if ($this->route) {
            return $this->route;
        }

        $route = $this->router->current();

        if (is_null($route)) {
            return ['errors.404', []];
        }

        $name = $route->getName();

        if (is_null($name)) {
            $uri = array_first($route->methods()) . ' /' . ltrim($route->uri(), '/');

            throw new UnnamedRouteException(
                "The current route [{$uri} is not named"
            );
        }

        $params = array_values($route->parameters());
        return [$name, $params];
    }

    /**
     * Get the current route parameters
     *
     * @param $name
     * @param $params
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function set($name, $params): void
    {
        $this->route = [$name, $params];
    }

    /**
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function clear(): void
    {
        $this->route = null;
    }
}
