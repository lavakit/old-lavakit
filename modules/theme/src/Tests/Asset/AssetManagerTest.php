<?php

namespace Inspire\Theme\Tests\Asset;

use Inspire\Base\Tests\BaseTestCase;

class AssetManagerTest extends BaseTestCase
{
    public function testEmptyTest()
    {
        $stack = [];
        $this->assertEmpty($stack);
    }
}
