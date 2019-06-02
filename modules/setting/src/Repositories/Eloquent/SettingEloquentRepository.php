<?php

namespace Lavakit\Setting\Repositories\Eloquent;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Lavakit\Base\Repositories\Eloquent\BaseEloquentRepository;
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
}
