<?php

namespace Lavakit\Base\Composers;

use Lavakit\Base\Contracts\Composers\Translation;

/**
 * Class TranslationsAbstract
 * @package Lavakit\Base\Composers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
abstract class TranslationsAbstract implements Translation
{
    protected $translations = [];
    
    /**
     * Get the translations
     *
     * @return array
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }
    
    /**
     * Load the translation
     *
     * @param $key
     * @param array $translations
     * @return $this
     */
    public function load($key, array $translations)
    {
        $this->translations = array_merge($this->translations, [$key => $translations]);
    
        return $this;
    }
    
    /**
     * load the multi translations
     *
     * @param array $translations
     * @return $this
     */
    public function loads(array $translations)
    {
        $this->translations = array_merge($this->translations, $translations);
    
        return $this;
    }
}
