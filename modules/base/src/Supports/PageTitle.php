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
     * @param bool $full
     */
    public function setTitle($title = null, $full = true)
    {
        $this->title    = $title;

        if ($full) {
            $this->title .= ' - ' . config('base.app_name');
        }
    }

    /**
     * Get a Title for page
     * @return string Title
     */
    public function getTitle()
    {
        if (empty($this->title)) {
            return config('base.app_name');
        }

        return $this->title;
    }
}
