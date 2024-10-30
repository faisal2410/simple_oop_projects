<?php

require_once 'Transaction.php';

class CreditCardTransaction extends Transaction
{
    public function processTransaction()
    {
        echo "Processing credit card transaction...\n";
    }
}
