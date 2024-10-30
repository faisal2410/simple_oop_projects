<?php

final class PaymentProcessor
{
    public function execute(Transaction $transaction)
    {
        $transaction->initiateTransaction();
        $transaction->validateTransaction(); // Calls the secure, final method
        $transaction->processTransaction();
        echo "Transaction executed successfully.\n";
    }
}
