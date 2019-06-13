<?php

namespace Lavakit\Setting\Services\Transformers;

use Illuminate\Support\Arr;
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
    
    /** @var array $group */
    protected $group;
    
    /**
     * SettingTransformer constructor.
     * @param array $resource
     * @param array $dbSettings
     * @param string $typeGroup
     */
    public function __construct(array $resource = [], array $dbSettings = [], string $typeGroup = 'setting')
    {
        parent::__construct($resource);

        $this->dbSettings = $dbSettings;
        $this->group = $typeGroup;
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
        
        array_map(function ($locale) use (&$filter, $configures) {
            foreach ($configures as $tabName => $configure) {
                foreach ($configure as $name => $value) {
                    $nameField = $this->makeNameField($tabName, $name);
                    
                    if ($value['translatable']) {
                        $filter[$nameField][$locale] = $this->setValue($value, $nameField, $locale);
                    } else {
                        $filter[$nameField] = $this->setPlainValue($value, $nameField);
                    }
                }

            }
        }, array_keys(getSupportedLocales()));
        
        return Arr::add($filter, 'group', $this->group);
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
     * @param string $name
     * @param string $locale
     * @return array|null
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    protected function setValue(array $value, string $name, string $locale)
    {
        if (!$this->isMultiple($value)) {
            if (isset($this->dbSettings[$name])) {
                return $this->dbSettings[$name]->translate($locale)->value;
            }
    
            return null;
        }
    
        if (isset($this->dbSettings[$name])) {
            return json_decode($this->dbSettings[$name]->translate($locale)->value);
        }
        
        return [];
    }
    
    /**
     * @param array $value
     * @param string $name
     * @return array|mixed|null
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    protected function setPlainValue(array $value, string $name)
    {
        if (!$this->isMultiple($value)) {
            if (isset($this->dbSettings[$name])) {
                return $this->dbSettings[$name]->plain_value;
            }
            
            return null;
        }
    
        if (isset($this->dbSettings[$name])) {
            return json_decode($this->dbSettings[$name]->plain_value);
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
