<?php
// Payment.php

abstract class Payment
{
    protected float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    // Getter method to access the protected $amount property
    public function getAmount(): float
    {
        return $this->amount;
    }

    // Method for processing the payment
    abstract public function processPayment(): bool;

    // Method for validating payment details
    abstract public function validateDetails(): bool;

    // Method for calculating fees associated with the payment
    abstract public function calculateFees(): float;
}
