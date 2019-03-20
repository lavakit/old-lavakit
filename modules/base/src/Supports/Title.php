<?php

namespace Lavakit\Base\Supports;

/**
 * Class Title
 * @package Lavakit\Base\Supports
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Title
{
    /**
     * @var string
     */
    protected $title;

    /**
     * Set a Title for page
     *
     * @param string $title
     * @param bool $full
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function set($title = null, $full = true)
    {
        $this->title = $title;

        if ($full) {
            $this->title .= ' - ' . config('base.base.app_name');
        }
    }

    /**
     * Get a Title for page
     *
     * @return string Title
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function get()
    {
        if (empty($this->title)) {
            return config('base.base.app_name');
        }

        return $this->title;
    }
}
