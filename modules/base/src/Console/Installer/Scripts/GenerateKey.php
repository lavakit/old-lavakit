<?php

namespace Lavakit\Base\Console\Installer\Scripts;

use Illuminate\Console\Command;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class GenerateKey
 * @package Lavakit\Base\Console\Installer\Scripts
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class GenerateKey implements SetupScript
{
    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed
     */
    public function run(Command $command)
    {
        $command->call('key:generate');
    }
}
