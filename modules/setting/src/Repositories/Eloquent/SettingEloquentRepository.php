<?php

namespace Lavakit\Setting\Repositories\Eloquent;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Lavakit\Base\Repositories\Eloquent\BaseEloquentRepository;
use Lavakit\Setting\Events\SettingCreating;
use Lavakit\Setting\Events\SettingUpdating;
use Lavakit\Setting\Models\Setting;
use Lavakit\Setting\Repositories\SettingRepository;

/**
 * Class SettingEloquentRepository
 * @package Lavakit\Setting\Repositories\Eloquent
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class SettingEloquentRepository extends BaseEloquentRepository implements SettingRepository
{
    const NAME_FILE = 'setting';
    const IS_TRANSLATABLE = 'is_translatable';
    const NON_TRANSLATABLE = 'non_translatable';
    
    /** @var string $group */
    protected $group = 'setting';
    
    /**
     * Find a setting by it's array name field and value
     *
     * @example Param $column = ['field' => 'value']
     *
     * @param array $column
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function findByField(array $column)
    {
        return $this->model->where($column)->first();
    }

    /**
     * Find setting name
     *
     * @param  string $name
     * @return mixed
     */
    public function findBySetting($name)
    {
        return $this->model->where('group', $name)->get();
    }

    /**
     * Return all modules that have settings
     *
     * @param string | array $modules
     * @param bool $translatable
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function loadSettings($modules, $translatable = true)
    {
        $settings = $this->getConfigures($modules);

        if (!$translatable) {
            return $settings;
        }

        return $this->separateWidget($settings);
    }

    /**
     * Get configures
     *
     * @param $modules
     * @return array|\Illuminate\Config\Repository|mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function getConfigures($modules)
    {
        $settings = [];

        if (is_string($modules)) {
            return config(Str::finish(strtolower($modules), '.') . self::NAME_FILE);
        }

        foreach ($modules as $module) {
            if ($config = config(Str::finish(strtolower($module), '.') . self::NAME_FILE)) {
                $settings[$module] = $config;
            }
        }

        return $settings;
    }

    /**
     * Return the saved settings with name
     *
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function loadDbSetting($name)
    {
        $dbSettings = [];

        foreach ($this->findBySetting($name) as $setting) {
            $dbSettings[$setting->name] = $setting;
        }

        return $dbSettings;
    }

    /**
     * Return the translatable module setting
     *
     * @param $module
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getSettingTranslatable($module, $name = null)
    {
        $loadSettings = $this->loadSettings($module, $name);
        $configs = [];
        
        foreach ($loadSettings as $name => $settings) {
            $configs[$name] = $this->loadTranslatable($settings);
        }
        
        return $configs;
    }

    /**
     * Return the non translatable module settings
     *
     * @param $module
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getSettingOriginal($module, $name = null)
    {
        $loadSettings = $this->loadSettings($module, $name);
        $configs = [];
    
        foreach ($loadSettings as $name => $settings) {
            $configs[$name] = $this->loadOriginal($settings);
        }
    
        return $configs;
    }

    /**
     * Return all module that have settings with view separate between non translatable and translatable
     *
     * @param $configures
     * @param array $translations
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function separateWidget(array $configures = [], &$translations = [])
    {
        if (empty($configures)) {
            return $configures;
        }

        foreach ($configures as $name => $setting) {
            $translations[Str::singular($name)][self::IS_TRANSLATABLE] = $this->loadTranslatable($setting);
            $translations[Str::singular($name)][self::NON_TRANSLATABLE] = $this->loadOriginal($setting);
        }

        return array_map(function ($data) {
            foreach ($data as $key => $value) {
                if (empty($value)) {
                    unset($data[$key]);
                }
            }

            return $data;
        }, $translations);
    }
    
    /**
     * @param $settings
     * @return array
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function loadTranslatable($settings)
    {
        return array_filter($settings, function ($setting) {
            return isset($setting['translatable']) && $setting['translatable'] === true;
        });
    }
    
    /**
     * @param $settings
     * @return array
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function loadOriginal($settings)
    {
        return array_filter($settings, function ($setting) {
            return !isset($setting['translatable']) || $setting['translatable'] === false;
        });
    }
    
    /**
     * Create or update the settings
     *
     * @param array $settings
     * @return mixed
     */
    public function createOrUpdateSetting(array $settings)
    {
        if (!$settings) {
            return;
        }
    
        $this->removeGroupKey($settings);
        
        foreach ($settings as $name => $values) {
            if ($setting = $this->findByField(['name' => $name])) {
                $this->updateSetting($setting, $values);
                
                continue;
            }
    
            $this->createForName($name, $values);
        }
    }
    
    /**
     * Remove the group setting key
     *
     * @param $settings
     */
    private function removeGroupKey(&$settings)
    {
        if (!key_exists('group', $settings)) {
            return;
        }
        
        $this->group = $settings['group'];
        
        unset($settings['group']);
    }
    
    private function createForName($name, $values)
    {
        event($event = new SettingCreating($name, $values));
        
        $setting = new Setting();
        $setting->name = $name;
        $setting->group = $this->group;
        
        if ($this->isTranslatable($name)) {
            $setting->is_translatable = true;
            $this->setTranslatedAttributes($event->values, $setting);
        } else {
            $setting->is_translatable = false;
            $setting->plain_value = $this->getSettingPlainValue($event->values);
        }
        
        $setting->save();
    }
    
    /**
     * Update the given Setting
     *
     * @param Setting $setting
     * @param $settingValues
     */
    private function updateSetting(Setting $setting, $settingValues)
    {
        $name = $setting->name;
        event($event = new SettingUpdating($setting, $name, $settingValues));
        
        if ($this->isTranslatable($name)) {
            $this->setTranslatedAttributes($event->values, $setting);
        } else {
            $setting->plain_value = $this->getSettingPlainValue($event->values);
        }
        
        $setting->save();
    }
    
    /**
     * @param $values
     * @param Setting $setting
     */
    private function setTranslatedAttributes($values, Setting $setting)
    {
        foreach ($values as $lang => $value) {
            $setting->translateOrNew($lang)->value = $value;
        }
    }
    
    /**
     * @param string $name
     * @return bool
     */
    private function isTranslatable(string $name)
    {
        $settingConfigName = $this->getConfigSettingName($name);
        $setting = config("$settingConfigName");
        
        return isset($setting['translatable']) && $setting['translatable'] === true;
    }
    
    /**
     * @param string $name
     * @return string
     */
    private function getConfigSettingName(string $name)
    {
        [$tabPrefix, $name] = explode('::', $name);
        $tabPrefix = Str::plural($tabPrefix);
        $nameFile = self::NAME_FILE;
        
        return "{$this->group}.{$nameFile}.{$tabPrefix}.{$name}";
    }
    
    /**
     * Return the setting value(s). If values are ann array, json_encode them
     *
     * @param $value
     * @return false|string
     */
    private function getSettingPlainValue($value)
    {
        if (is_array($value)) {
            return json_encode($value);
        }

        if (is_bool($value) && !$value) {
            return null;
        }
        
        return $value;
    }
}
