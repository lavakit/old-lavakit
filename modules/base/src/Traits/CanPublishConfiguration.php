<?php

namespace Inspire\Base\Traits;

/**
 * Trait CanPublishConfiguration
 * @package Inspire\Base\Traits
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
trait CanPublishConfiguration
{
    /**
     * Publish the given configuration file name (without extension) and the given module
     *
     * @param string $module
     * @param string $fileName
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function publishConfig($module, $fileName)
    {
        if (app()->environment() === 'testing') {
            return;
        }

        $this->mergeConfigFrom($this->getModuleConfigFilePath($module, $fileName), strtolower($module));

        if (app()->runningInConsole()) {
            $pathConfig = strtolower("inspire/$module/$fileName") . '.php';
            $this->publishes([
                $this->getModuleConfigFilePath($module, $fileName) => config_path($pathConfig)
            ], 'config');
        }
    }

    /**
     * Get path of the give file name in the given module
     *
     * @param string $module
     * @param string $file
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function getModuleConfigFilePath($module, $file)
    {
        return $this->getModulePath($module) . "/config/$file.php";
    }

    /**
     * @param $module
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function getModulePath($module)
    {
        return base_path('modules' . DIRECTORY_SEPARATOR . strtolower($module));
    }
}
