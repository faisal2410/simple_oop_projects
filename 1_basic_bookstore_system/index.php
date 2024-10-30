<?php
require_once 'Book.php';      // Include the Book class
require_once 'Bookstore.php'; // Include the Bookstore class

$bookstore = new Bookstore(); // Create a new Bookstore object

// Create new Book objects
$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", 10.99);
$book2 = new Book("1984", "George Orwell", 8.99, false);
$book3 = new Book("To Kill a Mockingbird", "Harper Lee", 12.99);

// Add books to the bookstore
$bookstore->addBook($book1);
$bookstore->addBook($book2);
$bookstore->addBook($book3);

// List all books in the bookstore
$bookstore->listBooks();
