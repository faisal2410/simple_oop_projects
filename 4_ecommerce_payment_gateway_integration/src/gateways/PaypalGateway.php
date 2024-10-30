<?php

namespace Ecommerce\Gateways;

use Ecommerce\Interfaces\PaymentGateway;

class PayPalGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        // Simulate payment processing logic
        echo "Processing payment of $$amount via PayPal.\n";
        return true;
    }

    public function refund(float $amount): bool
    {
        echo "Refunding $$amount via PayPal.\n";
        return true;
    }

    public function generateReceipt(): string
    {
        return "Receipt from PayPal";
    }
}
