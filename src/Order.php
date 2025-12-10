<?php

namespace Src;

final class Order
{
    /**
     * Amount
     * @var int
     */
    public $amount = 0;

    /**
     * Payment gateway dependency
     * @var PaymentGateway
     */
    protected $gateway;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * Process the order
     * @return bool
     */
    public function process()
    {
        return $this->gateway->charge($this->amount);
    }
}
