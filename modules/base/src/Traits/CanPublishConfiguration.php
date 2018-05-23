<?php

namespace Inspire\Base\Traits;

trait CanPublishConfiguration
{
    /**
     * Publish the given configuration file name (without extension) and the given module
     *
     * @param string $module
     * @param string $fileName
     */
    public function publishConfig($module, $fileName)
    {
        if (app()->environment() === 'testing') {
            return;
        }

        $this->mergeConfigFrom($this->getModuleConfigFilePath($module, $fileName), strtolower($module));

        if (app()->runningInConsole()) {
            $this->publishes([
                $this->getModuleConfigFilePath($module, $fileName) => config_path(strtolower("inspire/$module/$fileName") . '.php')
            ],'config');
        }
    }

    /**
     * Get path of the give file name in the given module
     * @param string $module
     * @param string $file
     * @return string
     */
    private function getModuleConfigFilePath($module, $file)
    {
        return $this->getModulePath($module) . "/config/$file.php";
    }

    /**
     * @param $module
     * @return string
     */
    private function getModulePath($module)
    {
        return base_path('modules' . DIRECTORY_SEPARATOR . strtolower($module));
    }
}
