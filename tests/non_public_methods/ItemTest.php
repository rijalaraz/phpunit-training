<?php

namespace Tests\Non_public_methods;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
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

    public function testTokenIsAString()
    {
        $item = new Item();

        $reflector = new ReflectionClass(objectOrClass: Item::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new Item();

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}
