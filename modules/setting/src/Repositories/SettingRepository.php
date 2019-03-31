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
     * Return all modules that have settings
     *
     * @param $modules
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function loadAllSettings($modules, $name = null);

    /**
     * Return the saved module settings
     *
     * @param $module
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function saveSetting($module);

    /**
     * Return the translatable module setting
     *
     * @param $module
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getSettingTranslatable($module);

    /**
     * Return the non translatable module settings
     *
     * @param $module
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getSettingOriginal($module);
}
