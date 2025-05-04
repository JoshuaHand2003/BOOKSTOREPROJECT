<h2>Login</h2>

<?php
// If there is an error, display it in a red-colored paragraph
if (isset($error)) echo "<p style='color:red;'>$error</p>";
?>

<!-- Login form where the user inputs their email and password -->
<form method="POST" action="index.php?page=login">
    <label>Email:</label><br>
    <!-- Email input field with required validation -->
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <!-- Password input field with required validation -->
    <input type="password" name="password" required><br><br>

    <!-- Submit button to log the user in -->
    <input type="submit" value="Login">
</form>

<!-- Link for users who don't have an account to register -->
<p>Don't have an account? <a href="index.php?page=register">Register here</a>.</p>

