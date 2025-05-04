<?php
// Start the session to handle session variables
session_start();

// Include the necessary files for configuration and header
require_once '../../config/config.php';
require_once '../../templates/header.php';

// Ensure the user is logged in before proceeding with checkout
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: /BOOKSTOREPROJECT/views/users/login.php');
    exit();  // Prevent further code execution after redirection
}

// Check if the cart is empty or not set
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Display a message if the cart is empty
    echo "<div class='container'><h3>Your cart is empty.</h3></div>";
    require_once '../../templates/footer.php';  // Include the footer template
    exit();  // Stop execution since there's nothing in the cart
}

// If the user submits the checkout form (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Here, you can implement saving the cart data to a database like an 'orders' table
    unset($_SESSION['cart']);  // Empty the cart after checkout
    // Display a confirmation message
    echo "<div class='container'><h3>Thank you! Your order has been placed.</h3></div>";
    require_once '../../templates/footer.php';  // Include the footer template
    exit();  // End the script execution after confirmation
}

?>

<div class="container">
    <h2>Confirm Your Order</h2>
    <!-- Display cart items in a table -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <!-- Table headers -->
                <th>Book</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Initialize the total cost of the order
        $total = 0;

        // Loop through each item in the cart to display the book details
        foreach ($_SESSION['cart'] as $item) {
            // Calculate the subtotal for each book (price * quantity)
            $subtotal = $item['price'] * $item['quantity'];
            // Add the subtotal to the total cost
            $total += $subtotal;
            
            // Display each book's information in a table row
            echo "<tr>
                    <td>" . htmlspecialchars($item['title']) . "</td>
                    <td>€" . number_format($item['price'], 2) . "</td>
                    <td>" . htmlspecialchars($item['quantity']) . "</td>
                    <td>€" . number_format($subtotal, 2) . "</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Display the total price -->
    <h3>Total: €<?php echo number_format($total, 2); ?></h3>

    <!-- Checkout confirmation form -->
    <form method="post">
        <button type="submit">Confirm Checkout</button>  <!-- Button to confirm the checkout -->
        <a href="/BOOKSTOREPROJECT/views/cart/index.php">Cancel</a>  <!-- Link to cancel the checkout and go back to the cart -->
    </form>
</div>

<?php
// Include the footer template
require_once '../../templates/footer.php';
?>
