<?php

namespace Ecommerce\Gateways;

use Ecommerce\Interfaces\PaymentGateway;

class StripeGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        echo "Processing payment of $$amount via Stripe.\n";
        return true;
    }

    public function refund(float $amount): bool
    {
        echo "Refunding $$amount via Stripe.\n";
        return true;
    }

    public function generateReceipt(): string
    {
        return "Receipt from Stripe";
    }
}
