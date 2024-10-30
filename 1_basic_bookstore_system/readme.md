# Basic Bookstore System

## Project Overview

The **Basic Bookstore System** is a simple PHP object-oriented programming project designed to manage a collection of books in a bookstore. This project allows users to add books, list all available books, and display details for each book. It serves as an excellent example of how to implement object-oriented principles in PHP.

## Goal of the Project
The main goals of this project are:
- To demonstrate the use of classes and objects in PHP.
- To explain the concept of the `$this` keyword and its role in accessing properties and methods within a class.
- To provide a practical example of managing data using object-oriented programming principles.

## Project Structure
The project consists of the following files:

```plaintext

1_basic_bookstore_system/ ├── Book.php ├── Bookstore.php └── index.php

```


## Detailed Steps for Creating the Project

### Step 1: Set Up the Project Structure
1. **Create a Project Folder**:
   - Create a folder named `1_basic_bookstore_system`.

2. **Create PHP Files**:
   - Inside the `1_basic_bookstore_system` folder, create the following files:
     - `Book.php`
     - `Bookstore.php`
     - `index.php`

### Step 2: Implement the `Book` Class
- Open `Book.php` and implement the `Book` class as follows:
```php
<?php
class Book {
    private $title;
    private $author;
    private $price;
    private $available;

    public function __construct($title, $author, $price, $available = true) {
        $this->title = $title; // Using $this to access class properties
        $this->author = $author;
        $this->price = $price;
        $this->available = $available;
    }

    public function displayDetails() {
        echo "Title: " . $this->title . "\n"; // Using $this to refer to the object's properties
        echo "Author: " . $this->author . "\n";
        echo "Price: $" . $this->price . "\n";
        echo "Available: " . ($this->available ? "Yes" : "No") . "\n";
    }

    public function updateAvailability($status) {
        $this->available = $status; // Using $this to update the object's property
    }
}
```
### Step 3: Implement the Bookstore Class

Open Bookstore.php and implement the Bookstore class as follows:

```php
<?php
class Bookstore {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book; // Using $this to manage the bookstore's collection
    }

    public function listBooks() {
        foreach ($this->books as $book) {
            $book->displayDetails(); // Using $this to call the method of the Book class
            echo "----------------------\n";
        }
    }

    public function searchBook($title) {
        foreach ($this->books as $book) {
            if ($book->title === $title) { // Using $this to access properties of the Book class
                return $book;
            }
        }
        return null; // Return null if the book is not found
    }
}
```

### Step 4: Create the index.php File

Open index.php and set it up as follows:

```php
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
```
### Step 5: Run the Project
```bash
php index.php

```

## Explanation of the $this Keyword

1. The $this keyword in PHP is used to refer to the current instance of the class. It allows access to the object's properties and methods from within the class.

2. In the Book class:
$this->title, $this->author, etc., are used to set and access the properties of the current book instance.

3. In methods like displayDetails() and updateAvailability(), $this is used to refer to the specific object's properties and modify them.

4. In the Bookstore class, $this->books is used to manage the collection of books, while $book->displayDetails() demonstrates how methods of the Book class are called on its instances.

## Conclusion
The 1 Basic Bookstore System serves as a foundational example of object-oriented programming in PHP. It helps users understand how to structure classes, utilize the $this keyword effectively, and manage data through a simple, relatable application.

```sql
Feel free to adjust any sections as needed to fit your specific project context or preferences!
```