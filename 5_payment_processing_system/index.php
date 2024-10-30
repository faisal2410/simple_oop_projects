<?php
// index.php

require_once 'CreditCardPayment.php';
require_once 'BankTransferPayment.php';
require_once 'CryptoPayment.php';

function processPayment(Payment $payment)
{
    if ($payment->validateDetails()) {
        $fees = $payment->calculateFees();
        echo "Payment amount: $" . $payment->getAmount() . "\n"; // Use getAmount() instead of accessing $amount directly
        echo "Processing fees: $" . $fees . "\n";
        if ($payment->processPayment()) {
            echo "Payment processed successfully!\n\n";
        }
    } else {
        echo "Payment details are invalid.\n\n";
    }
}

// Example: Credit Card Payment
$creditCardPayment = new CreditCardPayment(100, '1234567890123456', '12/25');
processPayment($creditCardPayment);

// Example: Bank Transfer Payment
$bankTransferPayment = new BankTransferPayment(200, '9876543210');
processPayment($bankTransferPayment);

// Example: Crypto Payment
$cryptoPayment = new CryptoPayment(150, '1A2b3C4d5E6f7G8h9I0j', 'Bitcoin');
processPayment($cryptoPayment);
