<?php

namespace Tests\Non_public_methods;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Src\Product;

final class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product();

        $reflector = new ReflectionClass(Product::class);

        $property = $reflector->getProperty('product_id');

        $property->setAccessible(true);
        $value = $property->getValue($product);

        $this->assertIsInt($value);
    }
}
