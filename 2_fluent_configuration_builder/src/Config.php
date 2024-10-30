<?php

class Config
{
    // Private properties to hold configuration settings
    private $settings = [
        'database_host' => 'localhost',
        'database_user' => 'root',
        'database_password' => '',
        'display_errors' => false,
        'log_level' => 'error',
    ];

    // Method to set the database host
    public function setDatabaseHost($host)
    {
        $this->settings['database_host'] = $host;
        return $this; // Return the current instance for chaining
    }

    // Method to set the database user
    public function setDatabaseUser($user)
    {
        $this->settings['database_user'] = $user;
        return $this;
    }

    // Method to set the database password
    public function setDatabasePassword($password)
    {
        $this->settings['database_password'] = $password;
        return $this;
    }

    // Method to set display errors
    public function setDisplayErrors($display)
    {
        $this->settings['display_errors'] = $display;
        return $this;
    }

    // Method to set log level
    public function setLogLevel($level)
    {
        $this->settings['log_level'] = $level;
        return $this;
    }

    // Method to get all settings
    public function getAllSettings()
    {
        return $this->settings;
    }

    // Method to reset settings to defaults
    public function reset()
    {
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
