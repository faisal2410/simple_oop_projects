# Fluent Configuration Builder

## Project Overview
The **Fluent Configuration Builder** project is a PHP-based tool designed to simplify the setup of configuration settings using a fluent interface. This project demonstrates the use of method chaining in PHP Object-Oriented Programming (OOP), where users can build configurations with a single, readable line of chained method calls.

## Concept Explained
In PHP OOP, method chaining allows you to call multiple methods on the same object in a single line of code. This is achieved by having each method return the current instance of the object (using `$this`). This project uses method chaining to provide an intuitive and fluent API for setting configuration values, making the code more readable and convenient to use.

## Project Goal
The goal of this project is to:
- Explain and demonstrate the concept of method chaining in PHP OOP.
- Provide a practical example of chaining methods for setting configuration options.
- Help PHP developers understand how fluent interfaces can improve code readability and usability.

## Detailed Code

### Config Class

```php
<?php

class Config {
    private $settings = [
        'database_host' => 'localhost',
        'database_user' => 'root',
        'database_password' => '',
        'display_errors' => false,
        'log_level' => 'error',
    ];

    public function setDatabaseHost($host) {
        $this->settings['database_host'] = $host;
        return $this;
    }

    public function setDatabaseUser($user) {
        $this->settings['database_user'] = $user;
        return $this;
    }

    public function setDatabasePassword($password) {
        $this->settings['database_password'] = $password;
        return $this;
    }

    public function setDisplayErrors($display) {
        $this->settings['display_errors'] = $display;
        return $this;
    }

    public function setLogLevel($level) {
        $this->settings['log_level'] = $level;
        return $this;
    }

    public function getAllSettings() {
        return $this->settings;
    }

    public function reset() {
        $this->settings = [
            'database_host' => 'localhost',
            'database_user' => 'root',
            'database_password' => '',
            'display_errors' => false,
            'log_level' => 'error',
        ];
        return $this;
    }
}
```

### Main File (index.php)

```php
<?php

require 'src/Config.php';

$config = new Config();
$config->setDatabaseHost('127.0.0.1')
       ->setDatabaseUser('admin')
       ->setDatabasePassword('securepassword')
       ->setDisplayErrors(true)
       ->setLogLevel('debug');

echo json_encode($config->getAllSettings(), JSON_PRETTY_PRINT);
```
## Project Creation Steps
1. Create Project Structure: Set up folders and files as below

```css
Fluent_configuration_builder/
└── src/
    └── Config.php
└── index.php
```
2. Define the Config Class: In Config.php, create a class with methods for setting configuration options.
3. Add Method Chaining: Ensure each setter method returns $this to enable chaining.
4. Initialize Configurations in index.php: Create an instance of Config and chain methods to set configuration values.
5. Output the Configuration: Convert the configuration array to JSON format and output it.
6. Run the Project: Use PHP’s built-in server to serve the project.

## How to Run the Project
1. Open your command line and navigate to the project directory 2_Fluent_configuration_builder.

2. Start the PHP server:
```bash
php -S localhost:8000
```
3. Open a web browser and go to http://localhost:8000/index.php to see the configuration output in JSON format.

## Key Takeaway from the Project
This project illustrates the benefits of method chaining and fluent interfaces in PHP OOP. By the end of this project, you will understand:

1. How to implement method chaining in PHP by returning $this.
2. How fluent interfaces can improve the readability and usability of configuration code.
3. Practical use cases for chaining methods to simplify complex configurations in applications.