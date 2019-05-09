<?php

namespace Lavakit\Setting\Services\Transformers;

use Lavakit\Translation\Services\Transformers\Transformer;

/**
 * Class SettingTransformer
 * @package Lavakit\Setting\Services\Transformers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingTransformer extends Transformer
{
    public function toArray($request = null)
    {
        return $this->filterValidate();
    }

    /**
     * @return array
     */
    protected function filterValidate()
    {
        $filter = [];

        $configures = $this->resource;

        array_map(function ($data) use (&$filter, $configures) {
            foreach ($configures as $configure) {
                foreach ($configure as $name => $value) {
                    if ($value['translatable']) {
                        $filter[$data][$name] = null;
                    } else {
                        $filter[$name] = null;
                    }
                }

            }
        }, array_keys(getSupportedLocales()));


        return $filter;
    }
}
