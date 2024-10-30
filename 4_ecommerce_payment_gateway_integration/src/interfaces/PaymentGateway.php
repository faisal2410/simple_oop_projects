<?php

namespace Ecommerce\Interfaces;

interface PaymentGateway
{
    public function processPayment(float $amount): bool;
    public function refund(float $amount): bool;
    public function generateReceipt(): string;
}
