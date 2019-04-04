<?php

namespace Lavakit\Setting\Repositories;

use Lavakit\Base\Repositories\BaseRepository;

/**
 * Interface SettingRepository
 * @package Lavakit\Setting\Repositories
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
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
     * @author hoatq <tqhoa8th@gmail.com
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
     * @param $modules
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function loadSettings($modules, $name = null);
    
    /**
     * Return all module that have settings with view separate between non translatable and translatable
     *
     * @param $module
     * @param null $name
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function separateViewSettings($module, $name = null);

    /**
     * Return the saved settings
     *
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function loadDbSetting($name);

    /**
     * Return the translatable module setting
     *
     * @param $module
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Groups
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getSettingTranslatable($module, $name = null);

    /**
     * Return the non translatable module settings
     *
     * @param $module
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getSettingOriginal($module, $name = null);
}
