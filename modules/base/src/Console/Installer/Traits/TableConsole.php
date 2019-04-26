<?php

namespace Lavakit\Base\Console\Installer\Traits;

/**
 * Trait TableConsole
 * @package Lavakit\Base\Console\Installer\Traits
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
trait TableConsole
{
    /**
     * @param array $headers
     * @param array $outputs
     * @param string $tableStyle
     */
    public function makeTable(array $headers, array $outputs, string $tableStyle = 'default')
    {
        $version = config('base.base.version');
        $tableOutputs = [];
        
        if (!empty($outputs)) {
            foreach ($outputs as $key => $name) {
                $tableOutputs[] = [
                    ++$key, class_basename($name), $version
                ];
            }
        }
        
        
        $this->table($headers, $tableOutputs, $tableStyle);
        $this->line('');
    }
}
