<?php
// CreditCardPayment.php

require_once 'Payment.php';

class CreditCardPayment extends Payment
{
    private string $cardNumber;
    private string $expiryDate;

    public function __construct(float $amount, string $cardNumber, string $expiryDate)
    {
        parent::__construct($amount);
        $this->cardNumber = $cardNumber;
        $this->expiryDate = $expiryDate;
    }

    public function processPayment(): bool
    {
        // Simulate payment processing
        echo "Processing credit card payment of $$this->amount.\n";
        return true;
    }

    public function validateDetails(): bool
    {
        // Simulate validation
        return !empty($this->cardNumber) && !empty($this->expiryDate);
    }

    public function calculateFees(): float
    {
        return $this->amount * 0.02; // 2% fee
    }
}
