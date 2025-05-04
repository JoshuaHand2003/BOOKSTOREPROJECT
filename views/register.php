<h2>Register</h2>

<?php
// If there is an error, display it in a red-colored paragraph
if (isset($error)) echo "<p style='color:red;'>$error</p>";
?>

<!-- Registration form where the user inputs their username, email, and password -->
<form method="POST" action="index.php?page=register">
    <label>Username:</label><br>
    <!-- Username input field with required validation -->
    <input type="text" name="username" required><br><br>

    <label>Email:</label><br>
    <!-- Email input field with required validation -->
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <!-- Password input field with required validation -->
    <input type="password" name="password" required><br><br>

    <!-- Submit button to submit the registration form -->
    <input type="submit" value="Register">
</form>

