<?php

namespace Tests\Non_public_methods;

use PHPUnit\Framework\TestCase;
use Src\Item;
use Src\ItemChild;

final class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item();

        $this->assertNotEmpty($item->getDescription());
    }

    public function testIDisAnInteger()
    {
        $item = new ItemChild();

        $this->assertIsInt($item->getID());
    }
}
