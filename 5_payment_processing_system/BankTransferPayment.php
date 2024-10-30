<?php
// BankTransferPayment.php

require_once 'Payment.php';

class BankTransferPayment extends Payment
{
    private string $bankAccount;

    public function __construct(float $amount, string $bankAccount)
    {
        parent::__construct($amount);
        $this->bankAccount = $bankAccount;
    }

    public function processPayment(): bool
    {
        echo "Processing bank transfer of $$this->amount.\n";
        return true;
    }

    public function validateDetails(): bool
    {
        return !empty($this->bankAccount);
    }

    public function calculateFees(): float
    {
        return 5.00; // Flat fee for bank transfers
    }
}
