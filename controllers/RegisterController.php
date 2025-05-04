<?php
require_once 'models/UserModel.php';

class RegisterController {
    public function handleRequest() {
        $userModel = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->sanitizeInput($_POST['username']);
            $email = $this->sanitizeInput($_POST['email']);
            $password = $_POST['password'];

            if ($userModel->register($username, $email, $password)) {
                $_SESSION['success'] = "Registration successful! Please log in.";
                header("Location: index.php?page=login");
                exit;
            } else {
                $error = "Registration failed. Try again.";
            }
        }

        include 'views/templates/header.php';
        include 'views/register.php';
        include 'views/templates/footer.php';
    }

    private function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
