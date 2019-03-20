<?php

namespace Lavakit\Theme\Tests\Asset;

use Lavakit\Base\Tests\BaseTestCase;
use Lavakit\Theme\Managers\AssetManager;

class AssetManagerTest extends BaseTestCase
{
    /**
     * @var AssetManager;
     */
    protected $assetManager;

    protected $countLoaddeaultJs;
    protected $countLoadDefaultCss;

    public function setUp()
    {
        parent::setUp();
        $this->assetManager = new AssetManager();

        $this->countLoaddeaultJs =  count($this->app['config']->get('theme.assets.javascript')); // 3 element default
        $this->countLoadDefaultCss =  count($this->app['config']->get('theme.assets.stylesheets')); // 3 element 3 element default
    }

    public function testItShouldReturnCollectionJavascript()
    {
        $count = count($this->assetManager->getJavascript());
        $this->assertEquals($this->countLoaddeaultJs, $count);
    }

    public function testItShouldReturnCollectionJavascriptWithLocation()
    {
        $count = $this->assetManager->getJavascript('top');
        $this->assertEquals(2, count($count));
    }

    public function testItShouldReturnCollectionJavascriptWithCDN()
    {
        $offline = 'theme.assets.offline';
        $jsConfigCDN = 'theme.assets.resources.javascript.jquery.use_cdn';
        $this->app['config']->set($offline, false);
        $this->app['config']->set($jsConfigCDN, true);
        $dataCDN = $this->assetManager->getJavascript();
        $this->assertEquals($this->countLoaddeaultJs, count($dataCDN));
    }

    public function testItShouldReturnCollectionStylesheet()
    {
        $count = count($this->assetManager->getStylesheets());
        $this->assertEquals($this->countLoadDefaultCss, $count);
        return $count;
    }

    /** @depends testItShouldReturnCollectionJavascript */
    public function testItShouldAddOneJavascript()
    {
        $this->assetManager->addJavascript('select2');
        $this->assertEquals($this->countLoaddeaultJs + 1, count($this->assetManager->getJavascript()));
    }

    public function testItShouldAddOneStylesheet()
    {
        $this->assetManager->addStylesheets('select2');
        $this->assertEquals($this->countLoadDefaultCss + 1, count($this->assetManager->getStylesheets()));
    }

    public function testRemoveDefaultDataConfigJavaScript()
    {
        $this->assetManager->removeJavascript(['jquery']);
        $this->assertEquals($this->countLoaddeaultJs - 1, count($this->assetManager->getJavascript()));
    }

    public function testRemoveDefaultDataConfigStylesheet()
    {
        $this->assetManager->removeStylesheets(['bootstrap']);
        $this->assertEquals($this->countLoadDefaultCss - 1, count($this->assetManager->getStylesheets()));
    }

    public function testItShouldAddOneJavascriptDirectly()
    {
        $this->assetManager->addJavascriptDirectly('http://source.select2.js', 'top');
        $this->assertContains('http://source.select2.js', $this->assetManager->getJavascript('top'));
    }

    public function testItShouldAddOneStyleSheetDirectly()
    {
        $this->assetManager->addStylesheetsDirectly('http://source.select2.css');
        $this->assertContains('http://source.select2.css', $this->assetManager->getStylesheets());
    }

    public function testItShouldReturnNull()
    {
        $this->assertEquals(0, count($this->assetManager->getAppModules()));
    }

    public function testItShouldAddOneModule()
    {
        $this->assetManager->addAppModule('post');
        $this->assertEquals(1, count($this->assetManager->getAppModules()));

        $this->assertTrue(true);
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}

