<?php

namespace Inspire\Translation\Repositories\Caches;

use Inspire\Base\Repositories\Caches\CacheDecorator;
use Inspire\Base\Services\Caches\CacheInterface;
use Inspire\Translation\Repositories\Interfaces\TranslationRepository;

/**
 * Class TranslationCacheDecorator
 * @package Inspire\Translation\Repositories\Caches
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class TranslationCacheDecorator extends CacheDecorator implements TranslationRepository
{
    /**
     * @var TranslationRepository
     */
    protected $repository;

    /** @var CacheInterface */
    protected $cache;

    /**
     * TranslationCacheDecorator constructor.
     * @param TranslationRepository $repository
     * @param CacheInterface $cache
     */
    public function __construct(TranslationRepository $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
