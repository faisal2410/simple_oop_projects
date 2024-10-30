<?php
class Bookstore
{
    private $books = [];

    public function addBook(Book $book)
    {
        $this->books[] = $book; // Using $this to manage the bookstore's collection
    }

    public function listBooks()
    {
        foreach ($this->books as $book) {
            $book->displayDetails(); // Using $this to call the method of the Book class
            echo "----------------------\n";
        }
    }

    public function searchBook($title)
    {
        foreach ($this->books as $book) {
            if ($book->title === $title) { // Using $this to access properties of the Book class
                return $book;
            }
        }
        return null; // Return null if the book is not found
    }
}
