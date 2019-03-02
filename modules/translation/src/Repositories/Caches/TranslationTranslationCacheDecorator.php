<?php

namespace Inspire\Translation\Repositories\Caches;

use Inspire\Base\Repositories\Caches\CacheDecorator;
use Inspire\Base\Services\Caches\CacheInterface;
use Inspire\Translation\Repositories\Interfaces\TranslationTranslationRepository;

/**
 * Class TranslationTranslationCacheDecorator
 * @package Inspire\Translation\Repositories\Caches
 * @copyright 2019 Inspire Group
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
