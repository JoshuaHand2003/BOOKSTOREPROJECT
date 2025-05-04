<h2>Manage Books</h2>

<!-- Form for adding or editing books -->
<form method="POST" enctype="multipart/form-data" action="index.php?page=adminbook&action=<?= isset($editBook) ? 'edit&id=' . $editBook['id'] : 'create' ?>">

    <!-- Title input field -->
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= $editBook['title'] ?? '' ?>" required><br><br>

    <!-- Author input field -->
    <label>Author:</label><br>
    <input type="text" name="author" value="<?= $editBook['author'] ?? '' ?>" required><br><br>

    <!-- Price input field -->
    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" value="<?= $editBook['price'] ?? '' ?>" required><br><br>

    <!-- Description input field -->
    <label>Description:</label><br>
    <textarea name="description" required><?= $editBook['description'] ?? '' ?></textarea><br><br>

    <!-- File upload for book image -->
    <label>Book Image:</label><br>
    <input type="file" name="image" <?= isset($editBook) ? '' : 'required' ?>><br><br>

    <!-- Display the current image if editing -->
    <?php if (!empty($editBook['image'])): ?>
    <img src="assets/images/<?= $editBook['image'] ?>" height="80"><br><br>
    <?php endif; ?>

    <!-- Submit button to either update or add the book -->
    <input type="submit" value="<?= isset($editBook) ? 'Update Book' : 'Add Book' ?>">
</form>

<hr>

<!-- Book List Section -->
<h3>Book List</h3>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Title</th><th>Author</th><th>Price</th><th>Description</th><th>Actions</th>
    </tr>
    <!-- Loop through books and display them in the table -->
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td> <!-- Display book title -->
            <td><?= htmlspecialchars($book['author']) ?></td> <!-- Display book author -->
            <td>€<?= number_format($book['price'], 2) ?></td> <!-- Display book price -->
            <td><?= htmlspecialchars($book['description']) ?></td> <!-- Display book description -->
            <td>
                <!-- Edit link -->
                <a href="index.php?page=adminbook&action=edit&id=<?= $book['id'] ?>">Edit</a> |
                <!-- Delete link with confirmation prompt -->
                <a href="index.php?page=adminbook&action=delete&id=<?= $book['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
