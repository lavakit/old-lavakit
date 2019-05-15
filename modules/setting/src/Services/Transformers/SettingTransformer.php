<?php

namespace Lavakit\Setting\Services\Transformers;

use Illuminate\Support\Str;
use Lavakit\Translation\Services\Transformers\Transformer;

/**
 * Class SettingTransformer
 * @package Lavakit\Setting\Services\Transformers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingTransformer extends Transformer
{
    /**
     * @param null $request
     * @return array|mixed
     */
    public function toArray($request = null)
    {
        return $this->filterValidate();
    }

    /**
     * @param array $singularKey
     * @return array
     */
    public function toActiveTranslatable(array $singularKey = [])
    {
        array_map(function ($name) use (&$singularKey) {
            $singularKey[Str::singular($name)] = locale();
        }, array_keys($this->resource));

        return $singularKey;
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
                        $filter[$data][$name] = $this->setValue($value);
                    } else {
                        $filter[$name] = $this->setValue($value);
                    }
                }

            }
        }, array_keys(getSupportedLocales()));


        return $filter;
    }

    /**
     * @param array $value
     * @return array|null
     */
    protected function setValue(array $value)
    {
        if (!$this->isMultiple($value)) {
            return null;
        }

        return [];
    }

    /**
     * @param array $value
     * @return bool
     */
    protected function isMultiple(array $value)
    {
        if (!isset($value['multiple']) || !$value['multiple']) {
            return false;
        }

        return true;
    }
}
