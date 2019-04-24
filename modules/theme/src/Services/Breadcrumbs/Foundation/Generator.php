<?php

namespace Lavakit\Theme\Services\Breadcrumbs\Foundation;

/**
 * Interface Generator
 * @package Lavakit\Theme\Services\Breadcrumbs\Foundation
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
interface Generator
{
    /**
     * Generate breadcrumbs
     *
     * @param array $callbacks
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public function generate(array $callbacks, string $name, array $params);
}
