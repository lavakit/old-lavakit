<?php

namespace Lavakit\Theme\Services\Breadcrumbs\Manager;

use Lavakit\Theme\Services\Breadcrumbs\Exceptions\InvalidBreadcrumbException;
use Lavakit\Theme\Services\Breadcrumbs\Foundation\Generator as BreadcrumbsGeneratorContract;
use Illuminate\Support\Collection;

class BreadcrumbsGenerator implements BreadcrumbsGeneratorContract
{
    /** @var array */
    protected $breadcrumbs = [];

    /**
     * The registered breadcrumb-generating callbacks.
     *
     * @var array
     */
    protected $callbacks = [];

    /**
     * Generate breadcrumbs
     *
     * @param array $callbacks
     * @param string $name
     * @param array $params
     * @return array|Collection|mixed
     * @throws InvalidBreadcrumbException
     */
    public function generate(array $callbacks, string $name, array $params)
    {
        $this->breadcrumbs = new Collection();
        $this->callbacks   = $callbacks;

        $this->call($name, $params);

        return $this->breadcrumbs;
    }

    /**
     * Call the Closure to generator breadcrumbs for a page
     *
     * @param $name
     * @param $params
     * @throws InvalidBreadcrumbException
     */
    protected function call($name, $params)
    {
        if (!isset($this->callbacks[$name])) {
            throw new InvalidBreadcrumbException(
                "Breadcrumb not found with name [{$name}]"
            );
        }

        $this->callbacks[$name]($this, ...$params);
    }

    /**
     * Add breadcrumbs for a parent page.
     *
     * @param string $name
     * @param mixed ...$params
     * @throws InvalidBreadcrumbException
     */
    public function parent(string $name, ...$params): void
    {
        $this->call($name, $params);
    }

    /**
     * Add a breadcrumb.
     *
     * @param string $title
     * @param string|null $url
     * @param array $data
     */
    public function push(string $title, string $url = null, array $data = []): void
    {
        $this->breadcrumbs->push((object) array_merge($data, compact('title', 'url')));
    }
}
