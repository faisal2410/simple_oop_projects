<?php
// CryptoPayment.php

require_once 'Payment.php';

class CryptoPayment extends Payment
{
    private string $walletAddress;
    private string $currency;

    public function __construct(float $amount, string $walletAddress, string $currency)
    {
        parent::__construct($amount);
        $this->walletAddress = $walletAddress;
        $this->currency = $currency;
    }

    public function processPayment(): bool
    {
        echo "Processing crypto payment of $$this->amount in $this->currency.\n";
        return true;
    }

    public function validateDetails(): bool
    {
        return !empty($this->walletAddress) && !empty($this->currency);
    }

    public function calculateFees(): float
    {
        return $this->amount * 0.01; // 1% fee for crypto payments
    }
}
