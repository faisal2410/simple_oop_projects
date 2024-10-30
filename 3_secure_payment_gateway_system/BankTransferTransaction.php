<?php

require_once 'Transaction.php';

class BankTransferTransaction extends Transaction
{
    public function processTransaction()
    {
        echo "Processing bank transfer transaction...\n";
    }
}
