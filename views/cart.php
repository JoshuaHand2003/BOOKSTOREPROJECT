<h2>Your Cart</h2>

<?php if (!empty($booksInCart)): ?>
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
        foreach ($booksInCart as $book):
            $total = $book['price'] * $book['quantity'];
            $grandTotal += $total;
        ?>
            <tr>
                <td>
                    <?php if (!empty($book['image'])): ?>
                        <img src="assets/images/<?= htmlspecialchars($book['image']) ?>" height="80">
                    <?php else: ?>
                        <em>No image</em>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td>€<?= number_format($book['price'], 2) ?></td>
                <td><?= $book['quantity'] ?></td>
                <td>€<?= number_format($total, 2) ?></td>
                <td>
                    <a href="index.php?page=cart&action=remove&id=<?= $book['id'] ?>" onclick="return confirm('Remove from cart?')">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5" align="right"><strong>Grand Total:</strong></td>
            <td colspan="2"><strong>€<?= number_format($grandTotal, 2) ?></strong></td>
        </tr>
    </table>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
