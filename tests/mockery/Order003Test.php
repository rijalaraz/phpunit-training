<?php

namespace Tests\Mockery;

use PHPUnit\Framework\TestCase;
use Src\Order;
use Src\PaymentGateway;

final class Order003Test extends TestCase
{
    public function tearDown(): void
    {
        \Mockery::close();
    }

    public function testOrderIsProcessedUsingMockery()
    {
        $gateway = \Mockery::mock(PaymentGateway::class);

        $gateway->shouldReceive('charge')
                ->once()
                ->with(200)
                ->andReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}
