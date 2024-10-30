<?php

namespace Ecommerce\Gateways;

use Ecommerce\Interfaces\PaymentGateway;

class BankTransferGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        echo "Processing bank transfer of $$amount.\n";
        return true;
    }

    public function refund(float $amount): bool
    {
        echo "Refunding $$amount via bank transfer.\n";
        return true;
    }

    public function generateReceipt(): string
    {
        return "Receipt from Bank Transfer";
    }
}
