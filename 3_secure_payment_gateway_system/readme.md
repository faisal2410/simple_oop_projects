# Secure Payment Gateway System

## Project Overview
The **Secure Payment Gateway System** is a PHP OOP-based simulation project that demonstrates the use of the `final` keyword to protect core functionalities in a secure transaction-processing environment. This project illustrates how to prevent method overriding and class inheritance using the `final` keyword, ensuring the security and stability of critical transaction processes.

## Project Objectives
1. **Explain the `final` Keyword**: Demonstrate the purpose and application of the `final` keyword in PHP OOP by securing key methods and classes.
2. **Reinforce PHP OOP Concepts**: Utilize inheritance and method overriding while enforcing restrictions through `final`.
3. **Simulate a Real-World System**: Showcase how to secure transaction processes in a real-world payment gateway simulation.

## Project Structure
The project files are organized as follows:

- **`Transaction.php`** - Base class defining core transaction functionality.
- **`PaymentProcessor.php`** - Final class that handles transaction execution.
- **`CreditCardTransaction.php`** - A specific transaction type for credit cards.
- **`BankTransferTransaction.php`** - A specific transaction type for bank transfers.
- **`index.php`** - The main file to execute the demonstration.

## Example Execution Flow
1. A `Transaction` object (e.g., `CreditCardTransaction` or `BankTransferTransaction`) is created.
2. The `PaymentProcessor` object initiates the transaction sequence by:
   - Initiating the transaction.
   - Validating it using a `final` method, preventing any modifications.
   - Processing the transaction according to its type (credit card or bank transfer).
3. An attempt to override the `validateTransaction()` method or inherit `PaymentProcessor` will result in an error, demonstrating the security benefits of the `final` keyword.

## Project Demonstration
1. **Preventing Inheritance**: The `PaymentProcessor` class is marked as `final`, preventing any subclass from altering the transaction execution flow.
2. **Secure Validation**: The `final` `validateTransaction()` method cannot be overridden, ensuring that validation logic remains secure across all transactions.

## Project Explanation

### Key Concepts:
- **`Transaction` Base Class**: Defines core transaction methods, including a `final` `validateTransaction()` method for secure validation.
- **`PaymentProcessor` Final Class**: This class, marked `final`, cannot be subclassed, ensuring secure execution.
- **Transaction Types**: `CreditCardTransaction` and `BankTransferTransaction` extend `Transaction` and can implement specific transaction processing, but they are bound by the secure, `final` validation logic.

## Detailed Code

### 1. `Transaction.php`

```php
<?php

class Transaction {
    public function initiateTransaction() {
        echo "Transaction initiated.\n";
    }

    final public function validateTransaction() {
        echo "Validating transaction securely...\n";
    }

    public function processTransaction() {
        echo "Processing transaction...\n";
    }
}

?>
```
2. PaymentProcessor.php
```php
<?php

final class PaymentProcessor {
    public function execute(Transaction $transaction) {
        $transaction->initiateTransaction();
        $transaction->validateTransaction();
        $transaction->processTransaction();
        echo "Transaction executed successfully.\n";
    }
}

?>
```
3. CreditCardTransaction.php
```php
<?php

require_once 'Transaction.php';

class CreditCardTransaction extends Transaction {
    public function processTransaction() {
        echo "Processing credit card transaction...\n";
    }
}

?>
```
4. BankTransferTransaction.php

```php
<?php

require_once 'Transaction.php';

class BankTransferTransaction extends Transaction {
    public function processTransaction() {
        echo "Processing bank transfer transaction...\n";
    }
}

?>
```
5. index.php
```php
<?php

require_once 'PaymentProcessor.php';
require_once 'CreditCardTransaction.php';
require_once 'BankTransferTransaction.php';

echo "--- Credit Card Transaction ---\n";
$creditCardTransaction = new CreditCardTransaction();
$processor = new PaymentProcessor();
$processor->execute($creditCardTransaction);

echo "\n--- Bank Transfer Transaction ---\n";
$bankTransferTransaction = new BankTransferTransaction();
$processor->execute($bankTransferTransaction);

?>
```

## How to Run the Project
1. Clone the Project: Copy the project files to a local directory.
2. Open Terminal: Navigate to the directory containing the files.
3. Run the Project:
```bash
php index.php
```
4. Observe the Output: The output will display a demonstration of the secure transaction process, illustrating the usage of the final keyword.

This project effectively shows how the final keyword can be used to protect core methods and classes in a payment gateway, ensuring secure and stable functionality.