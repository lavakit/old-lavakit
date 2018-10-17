<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    public function testEmpty()
    {
        $stack = array();

        $this->assertEmpty($stack);
    }
}
