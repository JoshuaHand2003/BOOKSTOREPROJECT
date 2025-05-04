<?php
require_once 'models/UserModel.php'; // Includes the UserModel to handle user-related operations.

class RegisterController {
    public function handleRequest() {
        $userModel = new UserModel(); // Creates a new UserModel object.

        // Handle POST request for registration.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->sanitizeInput($_POST['username']); // Sanitize username input.
            $email = $this->sanitizeInput($_POST['email']); // Sanitize email input.
            $password = $_POST['password']; // Get the password from the form.

            // Attempt to register the user with the provided data.
            if ($userModel->register($username, $email, $password)) {
                $_SESSION['success'] = "Registration successful! Please log in."; // Set a success message.
                header("Location: index.php?page=login"); // Redirect to the login page after successful registration.
                exit;
            } else {
                // If registration fails, show an error message.
                $error = "Registration failed. Try again.";
            }
        }

        // Includes the header, registration form, and footer templates.
        include 'views/templates/header.php';
        include 'views/register.php';
        include 'views/templates/footer.php';
    }

    // Sanitizes the input to prevent XSS attacks.
    private function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>
