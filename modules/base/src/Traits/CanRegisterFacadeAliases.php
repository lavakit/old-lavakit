<?php

namespace Inspire\Base\Traits;

use Illuminate\Foundation\AliasLoader;

/**
 * Trait CanRegisterFacadeAliases
 * @package Inspire\Base\Traits
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
trait CanRegisterFacadeAliases
{
    /**
     * Load additional alias
     *
     * @param array $facadeAliases
     * @return void
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function registerFacadeAliases(array $facadeAliases = [])
    {
        if (empty($facadeAliases)) {
            return;
        }

        $loader = AliasLoader::getInstance();
        foreach ($facadeAliases as $alias => $facade) {
            $loader->alias($alias, $facade);
        }
    }
}
