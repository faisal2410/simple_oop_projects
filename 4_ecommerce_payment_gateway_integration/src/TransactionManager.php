<?php

namespace Ecommerce;

use Ecommerce\Interfaces\PaymentGateway;
use Ecommerce\Exceptions\InsufficientFundsException;
use Ecommerce\Exceptions\TransactionFailedException;

class TransactionManager
{
    protected PaymentGateway $gateway;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function processTransaction(float $amount): void
    {
        try {
            if ($amount <= 0) {
                throw new InsufficientFundsException();
            }

            if (!$this->gateway->processPayment($amount)) {
                throw new TransactionFailedException();
            }

            echo $this->gateway->generateReceipt();
        } catch (InsufficientFundsException | TransactionFailedException $e) {
            echo $e->getMessage();
        }
    }
}
