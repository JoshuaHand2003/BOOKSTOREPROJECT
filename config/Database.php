<?php
// This class handles the database connection.
class Database {
    private $host = "localhost"; // The host is usually localhost for local development.
    private $db_name = "bookstore_db"; // This is the name of your database. Change it as needed.
    private $username = "root"; // The username to connect to the database (default for XAMPP is root).
    private $password = ""; // The password for the database user (default for XAMPP is empty).
    public $conn; // This will hold the connection object.

    // This method is responsible for establishing a connection to the database.
    public function getConnection() {
        $this->conn = null; // Set the connection to null initially.
        try {
            // Create a new PDO instance for MySQL connection.
            // It uses the host, database name, username, and password to establish a connection.
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, // Connection string
                $this->username, // Database username
                $this->password // Database password
            );
            // Set the error mode to exception so we can catch and handle errors.
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // If the connection fails, an exception will be thrown, and we show the error message.
            echo "Connection error: " . $e->getMessage();
        }
        // Return the connection object.
        return $this->conn;
    }
}
?>

