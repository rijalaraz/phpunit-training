<?php

namespace Tests\Mockery;

use Mockery;
use PHPUnit\Framework\TestCase;
use Src\MyOrder;
use Src\PaymentGateway;

final class Order005Test extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock()
    {
        $order = new MyOrder(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_mock = Mockery::mock(PaymentGateway::class);

        $gateway_mock->shouldReceive('charge')
                    ->once()
                    ->with(5.97);

        $order->process($gateway_mock);
    }

    public function testOrderIsProcessedUsingASpy()
    {
        $order = new MyOrder(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_spy = Mockery::spy(PaymentGateway::class);

        $order->process($gateway_spy);

        $gateway_spy->shouldHaveReceived('charge', [5.97]);
    }
}
