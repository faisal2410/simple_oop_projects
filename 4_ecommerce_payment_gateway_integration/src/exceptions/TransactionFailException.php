<?php

namespace Ecommerce\Exceptions;

use Exception;

class TransactionFailedException extends Exception
{
    protected $message = 'The transaction failed due to an error.';
}
