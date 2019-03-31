<?php

namespace Lavakit\Setting\Repositories\Caches;

use Lavakit\Base\Repositories\Caches\CacheDecorator;
use Lavakit\Base\Services\Caches\CacheInterface;
use Lavakit\Setting\Repositories\SettingRepository;

/**
 * Class SettingCacheDecorator
 * @package Lavakit\Setting\Repositories\Caches
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class SettingCacheDecorator extends CacheDecorator implements SettingRepository
{
    /**
     * @var SettingRepository
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * SettingCacheDecorator constructor.
     * @param SettingRepository $repository
     * @param CacheInterface $cache
     */
    public function __construct(SettingRepository $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        // TODO: Implement loadAllSettings() method.
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
        // TODO: Implement getSettingTranslatable() method.
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
