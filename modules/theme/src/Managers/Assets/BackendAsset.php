<?php

namespace Inspire\Theme\Managers\Assets;

use Inspire\Theme\Contracts\Assets\Backend as BackendContract;

/**
 * Class BackendAsset
 * @package Inspire\Theme\Managers
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class BackendAsset extends AssetAbstract implements BackendContract
{
    protected $config = 'backend';

    /**
     * AssetManager constructor.
     */
    public function __construct()
    {
        if (config('app.env') == 'production') {
            $this->build = config('base.base.version');
        }

        $this->build = time();
        $this->javascript = config("theme.{$this->config}.javascript");
        $this->stylesheets = config("theme.{$this->config}.stylesheets");
    }

    /**
     * @return mixed|string
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function assetPath()
    {
        return BACKEND_ASSET;
    }
}
