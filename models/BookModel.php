<?php
require_once 'config/Database.php';

class BookModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllBooks() {
        $sql = "SELECT * FROM books";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookById($id) {
        $sql = "SELECT * FROM books WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createBook($title, $author, $price, $description, $image) {
        $sql = "INSERT INTO books (title, author, price, description, image)
                VALUES (:title, :author, :price, :description, :image)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'title' => $title,
            'author' => $author,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ]);
    }
    
    public function updateBook($id, $title, $author, $price, $description, $image) {
        $sql = "UPDATE books SET title=:title, author=:author, price=:price, description=:description, image=:image
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ]);
    }
    
    public function deleteBook($id) {
        $sql = "DELETE FROM books WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    


}

