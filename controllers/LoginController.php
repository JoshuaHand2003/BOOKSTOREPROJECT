<?php
require_once 'models/UserModel.php'; // Includes the UserModel to handle user-related operations.

class LoginController {
    public function handleRequest() {
        $userModel = new UserModel(); // Create a new UserModel object.

        // Handle POST request for login.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->sanitizeInput($_POST['email']); // Sanitize email input.
            $password = $_POST['password']; // Get the password from the form.

            // Attempt to log the user in with provided credentials.
            $user = $userModel->login($email, $password);

            // If login is successful, store user info in session and redirect to home page.
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?page=home");
                exit;
            } else {
                // If login fails, show an error message.
                $error = "Invalid login credentials";
            }
        }

        // Includes header, login page, and footer templates to display the login form.
        include 'views/templates/header.php';
        include 'views/login.php';
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

