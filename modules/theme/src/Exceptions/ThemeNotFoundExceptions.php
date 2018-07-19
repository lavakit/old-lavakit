<?php

namespace Inspire\Theme\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ThemeNotFoundExceptions extends NotFoundHttpException
{
    public function __construct($themeName)
    {
        parent::__construct("Theme [ $themeName ] not found! Maybe you're missing a ".config('theme.config.name').' file.');
    }
}
