<?php

namespace Src;

interface PaymentGateway
{
    function charge($amount): bool;
}