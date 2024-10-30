<?php

require __DIR__ . '/../vendor/autoload.php';

use Ecommerce\Gateways\PayPalGateway;
use Ecommerce\Gateways\StripeGateway;
use Ecommerce\Gateways\BankTransferGateway;
use Ecommerce\TransactionManager;

echo "Choose a payment method:\n";
echo "1. PayPal\n";
echo "2. Stripe\n";
echo "3. Bank Transfer\n";

$choice = trim(fgets(STDIN));

switch ($choice) {
    case '1':
        $gateway = new PayPalGateway();
        break;
    case '2':
        $gateway = new StripeGateway();
        break;
    case '3':
        $gateway = new BankTransferGateway();
        break;
    default:
        echo "Invalid choice.\n";
        exit();
}

echo "Enter the amount to process:\n";
$amount = (float) trim(fgets(STDIN));

$transactionManager = new TransactionManager($gateway);
$transactionManager->processTransaction($amount);
