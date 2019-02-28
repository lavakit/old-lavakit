<?php

namespace Inspire\Theme\Services\Breadcrumbs\Foundation;

/**
 * Interface Generator
 * @package Inspire\Theme\Services\Breadcrumbs\Foundation
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
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
