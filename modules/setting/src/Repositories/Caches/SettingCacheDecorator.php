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
     * Find setting name
     *
     * @param  string $name
     * @return mixed
     */
    public function findBySetting($name)
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
    public function loadSettings($modules, $name = null)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
    
    /**
     * Return all module that have settings with view separate between non translatable and translatable
     *
     * @param $module
     * @param null $name
     * @return mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function separateViewSettings($module, $name = null)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
    
    
    /**
     * Return the saved settings
     *
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function loadDbSetting($name)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * Return the translatable module setting
     *
     * @param $module
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getSettingTranslatable($module, $name = null)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * Return the non translatable module settings
     *
     * @param $module
     * @param $name
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function getSettingOriginal($module, $name = null)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
