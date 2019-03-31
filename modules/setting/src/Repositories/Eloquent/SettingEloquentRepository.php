<?php

namespace Lavakit\Setting\Repositories\Eloquent;

use Illuminate\Support\Str;
use Lavakit\Base\Repositories\Eloquent\BaseEloquentRepository;
use Lavakit\Setting\Repositories\SettingRepository;

/**
 * Class SettingEloquentRepository
 * @package Lavakit\Setting\Repositories\Eloquent
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class SettingEloquentRepository extends BaseEloquentRepository implements SettingRepository
{
    /**
     * Find a setting by it's array name field and value
     *
     * @example Param $column = ['field' => 'value']
     *
     * @param array $column
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function findByField(array $column)
    {
        return $this->model->where($column)->first();
    }

    /**
     * Return all modules that have settings
     *
     * @param $modules
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function loadAllSettings($modules, $name = null)
    {
        if (!is_null($name)) {
            $name = '.' . Str::plural($name);
        }

        if (is_string($modules)) {
            return config(strtolower($modules) . '.setting'. $name);
        }

        $settings = [];

        foreach ($modules as $module) {
            if ($config = config(strtolower($module) . '.setting')) {
                $settings[$module] = $config;
            }
        }

        return $settings;
    }

    /**
     * Return the saved module settings
     *
     * @param $module
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function saveSetting($module)
    {
        // TODO: Implement saveSetting() method.
    }

    /**
     * Return the translatable module setting
     *
     * @param $module
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getSettingTranslatable($module)
    {

    }

    /**
     * Return the non translatable module settings
     *
     * @param $module
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getSettingOriginal($module)
    {
        // TODO: Implement getSettingOriginal() method.
    }
}
