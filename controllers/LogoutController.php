<?php
class LogoutController {
    public function handleRequest() {
        $_SESSION = []; // Clears all session data.

        // If session cookies are being used, remove the session cookie.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params(); // Get the session cookie parameters.
            setcookie(session_name(), '', time() - 42000, // Expire the session cookie.
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destroy the session.
        session_destroy();

        // Redirect to the homepage after logging out.
        header("Location: index.php?page=home");
        exit;
    }
}
?>
