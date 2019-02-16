<?php

namespace Inspire\Theme\Console;

use Illuminate\Console\Command;
use Inspire\Theme\Contracts\Themes\Frontend as ThemeFrontendContract;

/**
 * Class ThemeListCommand
 * @package Inspire\Theme\Console
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ThemeListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all available themes';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $themes = $this->laravel[ThemeFrontendContract::class]->all();
        $headers = ['Name', 'Author', 'Version', 'Parent'];
        $output = [];
        foreach ($themes as $theme) {
            $output[] = [
                'Name'    => $theme->get('name'),
                'Author'  => $theme->get('author'),
                'version' => $theme->get('version'),
                'parent'  => $theme->get('parent'),
            ];
        }
        $this->table($headers, $output);
    }
}
