<?php

require_once 'PaymentProcessor.php';
require_once 'CreditCardTransaction.php';
require_once 'BankTransferTransaction.php';

echo "--- Credit Card Transaction ---\n";
$creditCardTransaction = new CreditCardTransaction();
$processor = new PaymentProcessor();
$processor->execute($creditCardTransaction);

echo "\n--- Bank Transfer Transaction ---\n";
$bankTransferTransaction = new BankTransferTransaction();
$processor->execute($bankTransferTransaction);
