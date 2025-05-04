<?php
require_once 'models/BookModel.php';

class BooksController {
    public function handleRequest() {
        $bookModel = new BookModel();
        $books = $bookModel->getAllBooks();

        include 'views/templates/header.php';
        include 'views/books.php';
        include 'views/templates/footer.php';
    }
}
