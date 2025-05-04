<h2>Manage Books</h2>

<form method="POST" enctype="multipart/form-data" action="index.php?page=adminbook&action=<?= isset($editBook) ? 'edit&id=' . $editBook['id'] : 'create' ?>">

    <label>Title:</label><br>
    <input type="text" name="title" value="<?= $editBook['title'] ?? '' ?>" required><br><br>

    <label>Author:</label><br>
    <input type="text" name="author" value="<?= $editBook['author'] ?? '' ?>" required><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" value="<?= $editBook['price'] ?? '' ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required><?= $editBook['description'] ?? '' ?></textarea><br><br>
    <label>Book Image:</label><br>
    <input type="file" name="image" <?= isset($editBook) ? '' : 'required' ?>><br><br>

    <?php if (!empty($editBook['image'])): ?>
    <img src="assets/images/<?= $editBook['image'] ?>" height="80"><br><br>
    <?php endif; ?>


    <input type="submit" value="<?= isset($editBook) ? 'Update Book' : 'Add Book' ?>">
</form>

<hr>

<h3>Book List</h3>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Title</th><th>Author</th><th>Price</th><th>Description</th><th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td>€<?= number_format($book['price'], 2) ?></td>
            <td><?= htmlspecialchars($book['description']) ?></td>
            <td>
                <a href="index.php?page=adminbook&action=edit&id=<?= $book['id'] ?>">Edit</a> |
                <a href="index.php?page=adminbook&action=delete&id=<?= $book['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
