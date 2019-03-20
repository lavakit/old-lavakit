<?php

namespace Lavakit\Theme\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ThemeNotFoundExceptions
 * @package Lavakit\Theme\Exceptions
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ThemeNotFoundExceptions extends NotFoundHttpException
{
    public function __construct($themeName)
    {
        $name = config('theme.theme.config.name');

        parent::__construct("Theme [ $themeName ] not found! Maybe you're missing a " . $name . ' file.');
    }
}
