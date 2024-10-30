# E-commerce Payment Gateway Integration

## Project Overview
This project demonstrates the integration of multiple payment gateways in an e-commerce system using interfaces in PHP OOP. The system includes implementations for different payment gateways (e.g., PayPal, Stripe, Bank Transfer), allowing users to process payments without altering the core code. This project is designed to teach PHP developers how to apply interfaces, dependency injection, and exception handling in a scalable, real-world scenario.

## Project Objectives
- Enforce a consistent contract for payment processing using the `PaymentGateway` interface.
- Implement various payment methods that conform to the interface, such as `PayPalGateway`, `StripeGateway`, and `BankTransferGateway`.
- Handle errors with custom exceptions and add flexibility through dependency injection.

## Core Features
1. **PaymentGateway Interface**: Defines essential methods for processing payments, issuing refunds, and generating receipts.
2. **Multiple Payment Gateways**: Implements different payment methods, each adhering to the `PaymentGateway` interface.
3. **Transaction Manager**: Manages transactions with any payment gateway, supports easy addition of new gateways.
4. **Exception Handling**: Uses custom exceptions to manage transaction errors in a structured way.

## Skills Developed
- Applying interfaces for scalable architecture.
- Implementing dependency injection for flexible class interaction.
- Enhancing code structure and readability with modular design.
- Learning error handling and exception management for real-world applications.

## Project Code Snippet

###  src/Interfaces/PaymentGateway.php
```php

namespace Ecommerce\Interfaces;

interface PaymentGateway
{
    public function processPayment(float $amount): bool;
    public function refund(float $amount): bool;
    public function generateReceipt(): string;
}
```
### src/Gateways/PayPalGateway.php
```php

namespace Ecommerce\Gateways;
use Ecommerce\Interfaces\PaymentGateway;

class PayPalGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        echo "Processing payment of $$amount via PayPal.\n";
        return true;
    }

    public function refund(float $amount): bool
    {
        echo "Refunding $$amount via PayPal.\n";
        return true;
    }

    public function generateReceipt(): string
    {
        return "Receipt from PayPal";
    }
}
```
### src/gateways/BankTransferGateways.php
```php
<?php

namespace Ecommerce\Gateways;

use Ecommerce\Interfaces\PaymentGateway;

class BankTransferGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        echo "Processing bank transfer of $$amount.\n";
        return true;
    }

    public function refund(float $amount): bool
    {
        echo "Refunding $$amount via bank transfer.\n";
        return true;
    }

    public function generateReceipt(): string
    {
        return "Receipt from Bank Transfer";
    }
}


```
### src/gateways/stripegateway.php
```php

<?php

namespace Ecommerce\Gateways;

use Ecommerce\Interfaces\PaymentGateway;

class StripeGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        echo "Processing payment of $$amount via Stripe.\n";
        return true;
    }

    public function refund(float $amount): bool
    {
        echo "Refunding $$amount via Stripe.\n";
        return true;
    }

    public function generateReceipt(): string
    {
        return "Receipt from Stripe";
    }
}

```
### src/transactionmanager.php
```php
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

```

### src/exceptions/insufficientException.php
```php

<?php

namespace Ecommerce\Exceptions;

use Exception;

class InsufficientFundsException extends Exception
{
    protected $message = 'Insufficient funds to complete the transaction.';
}

```

### src/exceptions/transactionfailexception.php
```php
<?php

namespace Ecommerce\Exceptions;

use Exception;

class TransactionFailedException extends Exception
{
    protected $message = 'The transaction failed due to an error.';
}

```
### public/index.php
```php
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

```

### composer.json
```json
{
    "autoload": {
        "psr-4": {
            "Ecommerce\\": "src/"
        }
    }
}
```
## Project Structure

```arduino
ecommerce_payment_gateway/
├── src/
│   ├── Interfaces/
│   │   └── PaymentGateway.php
│   ├── Gateways/
│   │   ├── PayPalGateway.php
│   │   ├── StripeGateway.php
│   │   └── BankTransferGateway.php
│   ├── TransactionManager.php
│   └── Exceptions/
│       ├── InsufficientFundsException.php
│       └── TransactionFailedException.php
├── logs/
│   └── transactions.log
├── public/
│   └── index.php
└── composer.json
```


## How to Run the Project
1. Clone the repository.
2. Install dependencies and set up autoloading

```bash
composer install
```
3. Run the application

```bash
php public/index.php
```
4. Follow the on-screen prompts to choose a payment method and enter an amount.
```plaintext
Choose a payment method:
1. PayPal
2. Stripe
3. Bank Transfer

> 1
Enter the amount to process:
> 100

Processing payment of $100 via PayPal.
Receipt from PayPal
```

This output demonstrates the flexible, interface-driven design that allows users to switch between payment gateways seamlessly. Additional gateways can be added easily by implementing the PaymentGateway interface.

