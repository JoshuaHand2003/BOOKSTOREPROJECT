<?php
require_once 'models/BookModel.php';

class AdminBookController {
    public function handleRequest() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $bookModel = new BookModel();
        $action = $_GET['action'] ?? 'list';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $this->sanitize($_POST['title']);
            $author = $this->sanitize($_POST['author']);
            $price = $_POST['price'];
            $description = $this->sanitize($_POST['description']);
        
            // handle image upload
            $imageName = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $targetDir = "assets/images/";
                $imageName = time() . '_' . basename($_FILES["image"]["name"]);
                $targetFile = $targetDir . $imageName;
                move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
            } else if (isset($editBook)) {
                $imageName = $editBook['image']; // keep existing image on update
            }
        
            if ($_GET['action'] === 'create') {
                $bookModel->createBook($title, $author, $price, $description, $imageName);
            } elseif ($_GET['action'] === 'edit' && isset($_GET['id'])) {
                $bookModel->updateBook($_GET['id'], $title, $author, $price, $description, $imageName);
            }
        
            header("Location: index.php?page=adminbook");
            exit;
        }

        if ($action === 'delete' && isset($_GET['id'])) {
            $bookModel->deleteBook($_GET['id']);
            header("Location: index.php?page=adminbook");
            exit;
        }

        $editBook = null;
        if ($action === 'edit' && isset($_GET['id'])) {
            $editBook = $bookModel->getBookById($_GET['id']);
        }

        $books = $bookModel->getAllBooks();
        include 'views/templates/header.php';
        include 'views/admin_books.php';
        include 'views/templates/footer.php';
    }

    private function sanitize($input) {
        return htmlspecialchars(trim($input));
    }
}
