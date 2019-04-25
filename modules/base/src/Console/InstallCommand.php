<?php

namespace Lavakit\Base\Console;

use Illuminate\Console\Command;
use Lavakit\Base\Console\Installer\Installer;
use Lavakit\Base\Console\Installer\Traits\LoganMessage;

class InstallCommand extends Command
{
    use LoganMessage;
    
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'lavakit:install';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Lavakit CMS';
    
    /**
     * @var $installer
     */
    protected $installer;
    
    /**
     * InstallCommand constructor.
     * @param Installer $installer
     */
    public function __construct(Installer $installer)
    {
        parent::__construct();
        
        $this->getLaravel()['env'] = 'local';
        $this->installer = $installer;
    }
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->makeLoganCommand('Trinh Quoc Hoa', 'comment');
    }
}
