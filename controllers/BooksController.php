<?php
require_once 'models/BookModel.php'; // Includes the BookModel to interact with the database.

class BooksController {
    public function handleRequest() {
        $bookModel = new BookModel(); // Creates a new BookModel object.
        $books = $bookModel->getAllBooks(); // Fetches all books from the database.

        // Includes the header, books page, and footer templates to render the page.
        include 'views/templates/header.php';
        include 'views/books.php';
        include 'views/templates/footer.php';
    }
}
