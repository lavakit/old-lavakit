<?php

namespace Inspire\Base\Tests;

use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

abstract class BaseTestCase extends TestCase
{
    use CreatesApplication;

    protected $app;

    public function setUp()
    {
        parent::setUp();
    }
}
