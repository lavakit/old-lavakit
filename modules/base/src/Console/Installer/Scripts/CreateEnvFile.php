<?php

namespace Lavakit\Base\Console\Installer\Scripts;

use Illuminate\Console\Command;
use Lavakit\Base\Console\Installer\Scripts\Writers\EnvFile;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class CreateEnvFile
 * @package Lavakit\Base\Console\Installer\Scripts
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class CreateEnvFile implements SetupScript
{
    /**
     * @var EnvFile
     */
    protected $env;
    
    protected $command;
    
    /**
     * CreateEnvFile constructor.
     * @param EnvFile $env
     */
    public function __construct(EnvFile $env)
    {
        $this->env = $env;
    }
    
    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed|void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function run(Command $command)
    {
        $this->env->create();
        
        $command->info('Successfully created .env file');
    }
}
