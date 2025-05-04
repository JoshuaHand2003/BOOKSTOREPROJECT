<h2>Available Books</h2>

<?php if (isset($books) && count($books) > 0): ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Title</th><th>Author</th><th>Price</th><th>Description</th><th>Action</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td>€<?= number_format($book['price'], 2) ?></td>
                <td><?= htmlspecialchars($book['description']) ?></td>
                <td>
    <?php if ($book['image']): ?>
        <img src="assets/images/<?= $book['image'] ?>" height="80"><br>
    <?php endif; ?>
    <a href="index.php?page=cart&action=add&id=<?= $book['id'] ?>">Add to Cart</a>
</td>

            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No books found.</p>
<?php endif; ?>
