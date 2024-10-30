# Payment Processing System

## Project Overview
This project demonstrates the concept of **abstract classes and methods** in PHP Object-Oriented Programming (OOP). It simulates a simple payment processing system, where different payment methods (Credit Card, Bank Transfer, and Cryptocurrency) are implemented using an abstract `Payment` class. Each payment method has unique implementations for processing, validating details, and calculating fees.

## Objective
The main objective of this project is to showcase how to:
- Use abstract classes and methods in PHP.
- Enforce a common structure across different classes.
- Implement polymorphism in PHP by using the same method signature with varying implementations in child classes.

## Core Features
- **Abstract Class**: Defines the `Payment` abstract class with mandatory methods for all payment types.
- **Polymorphism**: Demonstrates polymorphism by using different payment methods under a single interface.
- **Fee Calculation**: Each payment method calculates fees uniquely.
- **Validation**: Validates each payment method's details before processing.

## Learning Outcomes
- Understand abstract classes and methods in PHP OOP.
- Implement polymorphism through abstract class inheritance.
- Define and use concrete methods in child classes.
- Structure PHP projects in a modular and reusable way.

## Project Structure

```markdown
PaymentProcessingSystem/
├── Payment.php                # Abstract class for payments
├── CreditCardPayment.php      # Concrete class for credit card payment
├── BankTransferPayment.php    # Concrete class for bank transfer payment
├── CryptoPayment.php          # Concrete class for cryptocurrency payment
└── index.php                  # Script to demonstrate payment processing

```


## Steps for Creating the Project
1. **Create the Abstract Payment Class**: Define an abstract class `Payment` with protected properties and abstract methods.
2. **Implement Concrete Payment Classes**: Create classes for `CreditCardPayment`, `BankTransferPayment`, and `CryptoPayment` that extend `Payment`.
3. **Define Unique Methods in Each Class**: Implement `processPayment`, `validateDetails`, and `calculateFees` methods based on the payment type.
4. **Create a Main Script**: Use `index.php` to instantiate payment objects and process them.
5. **Run the Project**: Execute `index.php` to see the abstract classes and methods in action.

## Detailed Code

### 1. Abstract Class: `Payment.php`
```php
<?php
// Payment.php

abstract class Payment {
    protected float $amount;

    public function __construct(float $amount) {
        $this->amount = $amount;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    abstract public function processPayment(): bool;
    abstract public function validateDetails(): bool;
    abstract public function calculateFees(): float;
}
?>
```

### 2. Concrete Class: CreditCardPayment.php
```php
<?php
// CreditCardPayment.php

require_once 'Payment.php';

class CreditCardPayment extends Payment {
    private string $cardNumber;
    private string $expiryDate;

    public function __construct(float $amount, string $cardNumber, string $expiryDate) {
        parent::__construct($amount);
        $this->cardNumber = $cardNumber;
        $this->expiryDate = $expiryDate;
    }

    public function processPayment(): bool {
        echo "Processing credit card payment of $$this->amount.\n";
        return true;
    }

    public function validateDetails(): bool {
        return !empty($this->cardNumber) && !empty($this->expiryDate);
    }

    public function calculateFees(): float {
        return $this->amount * 0.02;
    }
}
?>
```
### 3. Concrete Class: BankTransferPayment.php

```php
<?php
// BankTransferPayment.php

require_once 'Payment.php';

class BankTransferPayment extends Payment {
    private string $bankAccount;

    public function __construct(float $amount, string $bankAccount) {
        parent::__construct($amount);
        $this->bankAccount = $bankAccount;
    }

    public function processPayment(): bool {
        echo "Processing bank transfer of $$this->amount.\n";
        return true;
    }

    public function validateDetails(): bool {
        return !empty($this->bankAccount);
    }

    public function calculateFees(): float {
        return 5.00;
    }
}
?>
```
### 4. Concrete Class: CryptoPayment.php

```php
<?php
// CryptoPayment.php

require_once 'Payment.php';

class CryptoPayment extends Payment {
    private string $walletAddress;
    private string $currency;

    public function __construct(float $amount, string $walletAddress, string $currency) {
        parent::__construct($amount);
        $this->walletAddress = $walletAddress;
        $this->currency = $currency;
    }

    public function processPayment(): bool {
        echo "Processing crypto payment of $$this->amount in $this->currency.\n";
        return true;
    }

    public function validateDetails(): bool {
        return !empty($this->walletAddress) && !empty($this->currency);
    }

    public function calculateFees(): float {
        return $this->amount * 0.01;
    }
}
?>
```
### 5. Main Script: index.php
```php
<?php
// index.php

require_once 'CreditCardPayment.php';
require_once 'BankTransferPayment.php';
require_once 'CryptoPayment.php';

function processPayment(Payment $payment) {
    if ($payment->validateDetails()) {
        $fees = $payment->calculateFees();
        echo "Payment amount: $" . $payment->getAmount() . "\n";
        echo "Processing fees: $" . $fees . "\n";
        if ($payment->processPayment()) {
            echo "Payment processed successfully!\n\n";
        }
    } else {
        echo "Payment details are invalid.\n\n";
    }
}

// Examples
$creditCardPayment = new CreditCardPayment(100, '1234567890123456', '12/25');
processPayment($creditCardPayment);

$bankTransferPayment = new BankTransferPayment(200, '9876543210');
processPayment($bankTransferPayment);

$cryptoPayment = new CryptoPayment(150, '1A2b3C4d5E6f7G8h9I0j', 'Bitcoin');
processPayment($cryptoPayment);
?>
```
## How to Run the Project
1. Make sure PHP is installed on your machine.
2. Navigate to the project folder in the command line

```bash
cd /path/to/PaymentProcessingSystem
```
3. Run the main script

```bash
php index.php
```
4. You should see output that demonstrates the processing of each payment type with associated fees and validation.
This project provides a comprehensive look at how abstract classes and methods work in PHP OOP, showcasing the benefits of polymorphism and consistent class structures.

```css

This `README.md` provides a clear guide for understanding and using the **Payment Processing System** project to explore abstract classes and methods in PHP OOP.
```