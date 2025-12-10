<?php

namespace Tests\Mockery;

use PHPUnit\Framework\TestCase;
use Src\Order;
use Src\PaymentGateway;

final class Order001Test extends TestCase
{
    public function testOrderIsProcessed()
    {
        $gateway = $this->getMockBuilder(PaymentGateway::class)
                        ->getMock();

        $gateway->expects($this->once())
                ->method('charge')
                ->with($this->equalTo(200))
                ->willReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}
