<?php

class Transaction
{
    public function initiateTransaction()
    {
        echo "Transaction initiated.\n";
    }

    final public function validateTransaction()
    {
        echo "Validating transaction securely...\n";
    }

    public function processTransaction()
    {
        echo "Processing transaction...\n";
    }
}
