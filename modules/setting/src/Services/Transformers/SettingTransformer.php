<?php

namespace Lavakit\Setting\Services\Transformers;

use Illuminate\Support\Str;
use Lavakit\Setting\Models\Setting;
use Lavakit\Translation\Services\Transformers\Transformer;

/**
 * Class SettingTransformer
 * @package Lavakit\Setting\Services\Transformers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingTransformer extends Transformer
{
    /** @var Setting */
    protected $dbSettings = [];

    public function __construct(array $resource = [], array $dbSettings = [])
    {
        parent::__construct($resource);

        $this->dbSettings = $dbSettings;
    }

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
            foreach ($configures as $tabName => $configure) {
                foreach ($configure as $name => $value) {
                    if ($value['translatable']) {
                        $filter[$data][$this->makeNameField($tabName, $name)] = $this->setValue($value);
                    } else {
                        $filter[$this->makeNameField($tabName, $name)] = $this->setValue($value);
                    }
                }

            }
        }, array_keys(getSupportedLocales()));

        echo'<pre>';
            print_r($filter);
        echo'</pre>';
        die;

        return $filter;
    }

    /**
     * @param string $prefix
     * @param string|null $name
     * @return string
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function makeNameField(string $prefix = 'global', string $name = null)
    {
        return Str::finish(Str::singular($prefix), '::') . $name;
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
