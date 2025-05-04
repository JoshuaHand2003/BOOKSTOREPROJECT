<?php
require_once 'models/BookModel.php';

class CartController {
    public function handleRequest() {
        $action = $_GET['action'] ?? '';
        $id = $_GET['id'] ?? null;
        $bookModel = new BookModel();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if ($action === 'add' && $id) {
            if (!isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] = 1;
            } else {
                $_SESSION['cart'][$id]++;
            }
            header("Location: index.php?page=cart");
            exit;
        }

        if ($action === 'remove' && $id) {
            unset($_SESSION['cart'][$id]);
            header("Location: index.php?page=cart");
            exit;
        }

        $booksInCart = [];
        foreach ($_SESSION['cart'] as $bookId => $qty) {
            $book = $bookModel->getBookById($bookId);
            if ($book) {
                $book['quantity'] = $qty;
                $booksInCart[] = $book;
            }
        }

        include 'views/templates/header.php';
        include 'views/cart.php';
        include 'views/templates/footer.php';
    }
}
