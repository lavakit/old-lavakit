<?php

namespace Lavakit\Base\Events;

/**
 * Class LoadBackendTranslations
 * @package Lavakit\Base\Events
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class LoadBackendTranslations
{
    private $translations = [];

    /**
     * Get the translations
     *
     * @return array
     */
    public function getTranslations() : array
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
