<?php

namespace Ecommerce\Exceptions;

use Exception;

class InsufficientFundsException extends Exception
{
    protected $message = 'Insufficient funds to complete the transaction.';
}
