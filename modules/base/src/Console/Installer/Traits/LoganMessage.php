<?php

namespace Lavakit\Base\Console\Installer\Traits;

/**
 * Trait LoganMessage
 * @package Lavakit\Base\Console\Installer\Traits
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
trait LoganMessage
{
    /**
     * Show message in command
     *
     * @param string $message
     * @param string $type
     */
    public function makeLoganCommand(string $message, string $type = 'info')
    {
        $this->line($message, $type);
    }
}
