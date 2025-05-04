<?php
require_once 'models/UserModel.php';

class LoginController {
    public function handleRequest() {
        $userModel = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->sanitizeInput($_POST['email']);
            $password = $_POST['password'];

            $user = $userModel->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?page=home");
                exit;
            } else {
                $error = "Invalid login credentials";
            }
        }

        include 'views/templates/header.php';
        include 'views/login.php';
        include 'views/templates/footer.php';
    }

    private function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
