<?php

require 'src/Config.php'; // Include the Config class

// Create a new instance of Config and chain methods to set configurations
$config = new Config();
$config->setDatabaseHost('127.0.0.1')
    ->setDatabaseUser('admin')
    ->setDatabasePassword('securepassword')
    ->setDisplayErrors(true)
    ->setLogLevel('debug');

// Output the final configuration settings as JSON
echo json_encode($config->getAllSettings(), JSON_PRETTY_PRINT);
