<?php

namespace Lavakit\Setting\Repositories;

use Illuminate\Database\Eloquent\Model;
use Lavakit\Base\Repositories\BaseRepository;

/**
 * Interface SettingRepository
 * @package Lavakit\Setting\Repositories
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
interface SettingRepository extends BaseRepository
{
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
    public function findByField(array $column);

    /**
     * Find setting name
     *
     * @param  string $name
     * @return mixed
     */
    public function findBySetting($name);

    /**
     * Return all modules that have settings
     *
     * @param string | array $modules
     * @param bool $translatable
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function loadSettings($modules, bool $translatable = true);

    /**
     * Return the saved settings
     *
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function loadDbSetting($name);

    /**
     * Return the translatable module setting
     *
     * @param $module
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Groups
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getSettingTranslatable($module, $name = null);

    /**
     * Return the non translatable module settings
     *
     * @param $module
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getSettingOriginal($module, $name = null);
    
    /**
     * Create or update the settings
     *
     * @param array $setting
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function createOrUpdateSetting(array $setting);
}
