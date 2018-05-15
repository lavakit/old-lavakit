<?php

namespace Inspire\Base\Supports;

class PageTitle
{
    /**
     * @var string $title
     */
    protected $title;

    /**
     * Set a Title for page
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get a Title for page
     *
     * @param bool $origin
     */
    public function getTitle($origin = true)
    {
        if (empty($this->title)) {
            return config('base.app_name');
        }

        if (! $origin) {
            return $this->title;
        }

        return $this->title . ' | ' . config('base.app_name');
    }
}