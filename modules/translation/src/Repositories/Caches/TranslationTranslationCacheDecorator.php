<?php

namespace Lavakit\Translation\Repositories\Caches;

use Lavakit\Base\Repositories\Caches\CacheDecorator;
use Lavakit\Base\Services\Caches\CacheInterface;
use Lavakit\Translation\Repositories\Interfaces\TranslationTranslationRepository;

/**
 * Class TranslationTranslationCacheDecorator
 * @package Lavakit\Translation\Repositories\Caches
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class TranslationTranslationCacheDecorator extends CacheDecorator implements TranslationTranslationRepository
{
    /**
     * @var TranslationTranslationRepository
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * TranslationTranslationCacheDecorator constructor.
     * @param TranslationTranslationRepository $repository
     * @param CacheInterface $cache
     */
    public function __construct(TranslationTranslationRepository $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
