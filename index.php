<?php
require "../config/db.php";
require "../includes/auth.php";

include "../includes/header.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
?>

<table>
<tr>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Actions</th>
</tr>

<?php while ($row = $stmt->fetch()) : ?>
<tr>
    <td><?= htmlspecialchars($row['product_name']) ?></td>
    <td><?= htmlspecialchars($row['category']) ?></td>
    <td>Rs <?= $row['price'] ?></td>
    <td><?= $row['quantity'] ?></td>
    <td>
        <a class="btn edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
        <a class="btn delete" href="delete.php?id=<?= $row['id'] ?>" 
           onclick="return confirm('Delete this product?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

<?php include "../includes/footer.php"; ?>

