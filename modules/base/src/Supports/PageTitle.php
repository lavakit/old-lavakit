<?php

namespace Inspire\Base\Supports;

/**
 * Class PageTitle
 * @package Inspire\Base\Supports
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
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
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function setTitle($title = null, $full = true)
    {
        $this->title = $title;

        if ($full) {
            $this->title .= ' - ' . config('base.app_name');
        }
    }

    /**
     * Get a Title for page
     *
     * @return string Title
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getTitle()
    {
        if (empty($this->title)) {
            return config('base.app_name');
        }

        return $this->title;
    }
}
