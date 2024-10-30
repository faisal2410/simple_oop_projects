<?php
class Book
{
    private $title;
    private $author;
    private $price;
    private $available;

    public function __construct($title, $author, $price, $available = true)
    {
        $this->title = $title; // Using $this to access class properties
        $this->author = $author;
        $this->price = $price;
        $this->available = $available;
    }

    public function displayDetails()
    {
        echo "Title: " . $this->title . "\n"; // Using $this to refer to the object's properties
        echo "Author: " . $this->author . "\n";
        echo "Price: $" . $this->price . "\n";
        echo "Available: " . ($this->available ? "Yes" : "No") . "\n";
    }

    public function updateAvailability($status)
    {
        $this->available = $status; // Using $this to update the object's property
    }
}
