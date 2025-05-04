<h2>Available Books</h2>

<!-- Check if books exist and are available to display -->
<?php if (isset($books) && count($books) > 0): ?>
    <!-- Table for displaying books -->
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Title</th><th>Author</th><th>Price</th><th>Description</th><th>Action</th>
        </tr>
        <!-- Loop through each book to display its details -->
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= htmlspecialchars($book['title']) ?></td> <!-- Display book title -->
                <td><?= htmlspecialchars($book['author']) ?></td> <!-- Display book author -->
                <td>€<?= number_format($book['price'], 2) ?></td> <!-- Display book price with two decimal places -->
                <td><?= htmlspecialchars($book['description']) ?></td> <!-- Display book description -->
                <td>
                    <!-- Show image if available -->
                    <?php if ($book['image']): ?>
                        <img src="assets/images/<?= $book['image'] ?>" height="80"><br>
                    <?php endif; ?>
                    <!-- Link to add book to cart -->
                    <a href="index.php?page=cart&action=add&id=<?= $book['id'] ?>">Add to Cart</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <!-- Display message if no books found -->
    <p>No books found.</p>
<?php endif; ?>
