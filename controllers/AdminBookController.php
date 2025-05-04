<?php
require_once 'models/BookModel.php'; // Includes the BookModel to interact with the database.

class AdminBookController {
    public function handleRequest() {
        // If no user is logged in, redirect to login page.
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $bookModel = new BookModel(); // Creates a new BookModel object.
        $action = $_GET['action'] ?? 'list'; // Default action is 'list'.

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize input fields.
            $title = $this->sanitize($_POST['title']);
            $author = $this->sanitize($_POST['author']);
            $price = $_POST['price'];
            $description = $this->sanitize($_POST['description']);
        
            // Handle image upload.
            $imageName = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $targetDir = "assets/images/";
                $imageName = time() . '_' . basename($_FILES["image"]["name"]);
                $targetFile = $targetDir . $imageName;
                move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
            } else if (isset($editBook)) {
                $imageName = $editBook['image']; // Keep the existing image when editing.
            }
        
            // Create or edit book based on the action.
            if ($_GET['action'] === 'create') {
                $bookModel->createBook($title, $author, $price, $description, $imageName);
            } elseif ($_GET['action'] === 'edit' && isset($_GET['id'])) {
                $bookModel->updateBook($_GET['id'], $title, $author, $price, $description, $imageName);
            }
        
            header("Location: index.php?page=adminbook");
            exit;
        }

        // Delete book if 'delete' action is triggered.
        if ($action === 'delete' && isset($_GET['id'])) {
            $bookModel->deleteBook($_GET['id']);
            header("Location: index.php?page=adminbook");
            exit;
        }

        // Get book details for editing.
        $editBook = null;
        if ($action === 'edit' && isset($_GET['id'])) {
            $editBook = $bookModel->getBookById($_GET['id']);
        }

        // Get all books and render the views.
        $books = $bookModel->getAllBooks();
        include 'views/templates/header.php';
        include 'views/admin_books.php';
        include 'views/templates/footer.php';
    }

    // Function to sanitize input data.
    private function sanitize($input) {
        return htmlspecialchars(trim($input));
    }
}
