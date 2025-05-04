<h2>Your Cart</h2>

<!-- Check if the cart is not empty -->
<?php if (!empty($booksInCart)): ?>
    <!-- Table to display cart contents -->
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        $grandTotal = 0;
        // Loop through the books in the cart
        foreach ($booksInCart as $book):
            $total = $book['price'] * $book['quantity']; // Calculate total for each book
            $grandTotal += $total; // Add to the grand total
        ?>
            <tr>
                <td>
                    <!-- Display book image or a placeholder if no image -->
                    <?php if (!empty($book['image'])): ?>
                        <img src="assets/images/<?= htmlspecialchars($book['image']) ?>" height="80">
                    <?php else: ?>
                        <em>No image</em>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($book['title']) ?></td> <!-- Book title -->
                <td><?= htmlspecialchars($book['author']) ?></td> <!-- Book author -->
                <td>€<?= number_format($book['price'], 2) ?></td> <!-- Book price -->
                <a href="checkout.php"><button>Checkout</button></a> <!-- Checkout button -->
                <td><?= $book['quantity'] ?></td> <!-- Quantity of books -->
                <td>€<?= number_format($total, 2) ?></td> <!-- Total price for that book -->
                <td>
                    <!-- Link to remove the book from the cart -->
                    <a href="index.php?page=cart&action=remove&id=<?= $book['id'] ?>" onclick="return confirm('Remove from cart?')">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <!-- Display grand total -->
        <tr>
            <td colspan="5" align="right"><strong>Grand Total:</strong></td>
            <td colspan="2"><strong>€<?= number_format($grandTotal, 2) ?></strong></td>
        </tr>
    </table>
<?php else: ?>
    <!-- Display message if the cart is empty -->
    <p>Your cart is empty.</p>
<?php endif; ?>

