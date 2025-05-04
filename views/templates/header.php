<!DOCTYPE html>
<html>
<head>
    <title>BookStore Project</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header style="background-color: #f5f5f5; padding: 20px; border-bottom: 1px solid #ddd;">
        <div style="max-width: 1000px; margin: auto; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center;">
                <img src="assets/images/logo.png" alt="BookStore Logo" style="height: 50px; margin-right: 15px;">
                <h1 style="margin: 0; font-size: 24px;">Welcome to the BookStore</h1>
            </div>
            <nav>
                <a href="index.php?page=home">Home</a> |
                <a href="index.php?page=books">Books</a> |
                <a href="index.php?page=cart">Cart</a> |
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="index.php?page=logout">Logout</a>
                <?php else: ?>
                    <a href="index.php?page=login">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
