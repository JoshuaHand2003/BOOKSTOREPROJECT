<?php
require_once 'config/Database.php'; // Includes the Database class to connect to the database.

class BookModel {
    private $conn; // Database connection.

    public function __construct() {
        $db = new Database(); // Create a new Database object.
        $this->conn = $db->getConnection(); // Get the connection from the Database class.
    }

    // Fetch all books from the database.
    public function getAllBooks() {
        $sql = "SELECT * FROM books"; // SQL query to select all books.
        $stmt = $this->conn->prepare($sql); // Prepare the SQL statement.
        $stmt->execute(); // Execute the query.

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all books as an associative array.
    }

    // Fetch a single book by its ID.
    public function getBookById($id) {
        $sql = "SELECT * FROM books WHERE id = :id"; // SQL query to select a book by ID.
        $stmt = $this->conn->prepare($sql); // Prepare the SQL statement.
        $stmt->execute(['id' => $id]); // Execute the query with the provided ID.

        return $stmt->fetch(PDO::FETCH_ASSOC); // Return the book as an associative array.
    }

    // Insert a new book into the database.
    public function createBook($title, $author, $price, $description, $image) {
        $sql = "INSERT INTO books (title, author, price, description, image)
                VALUES (:title, :author, :price, :description, :image)"; // SQL query to insert a new book.
        $stmt = $this->conn->prepare($sql); // Prepare the SQL statement.
        return $stmt->execute([ // Execute the query with the provided data.
            'title' => $title,
            'author' => $author,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ]);
    }
    
    // Update an existing book in the database.
    public function updateBook($id, $title, $author, $price, $description, $image) {
        $sql = "UPDATE books SET title=:title, author=:author, price=:price, description=:description, image=:image
                WHERE id=:id"; // SQL query to update an existing book.
        $stmt = $this->conn->prepare($sql); // Prepare the SQL statement.
        return $stmt->execute([ // Execute the query with the provided data.
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ]);
    }
    
    // Delete a book from the database.
    public function deleteBook($id) {
        $sql = "DELETE FROM books WHERE id=:id"; // SQL query to delete a book by ID.
        $stmt = $this->conn->prepare($sql); // Prepare the SQL statement.
        return $stmt->execute(['id' => $id]); // Execute the query with the provided ID.
    }
}
?>
