<?php

namespace Lavakit\Theme\Managers\Assets;

use Lavakit\Theme\Contracts\Assets\Frontend as FrontendContract;

/**
 * Class FrontendAsset
 * @package Lavakit\Theme\Managers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class FrontendAsset extends AssetAbstract implements FrontendContract
{
    protected $config = 'frontend';

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
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function assetPath()
    {
        return ASSET_FRONTEND;
    }
}
