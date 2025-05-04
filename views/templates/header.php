<!DOCTYPE html>
<html>
<head>
    <title>BookStore Project</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <h1>📚 Welcome to the BookStore</h1>
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
</header>
<main>
