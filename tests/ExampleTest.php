<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoResultsInFour()
    {
        $this->assertEquals(4, 2+2);
    }

    public function tearDown(): void
    {
        \Mockery::close();
    }
}
