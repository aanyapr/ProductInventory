<?php
require "../config/db.php";
require "../includes/auth.php";

include "../includes/header.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare(
        "INSERT INTO products (product_name, category, price, quantity)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['category'],
        $_POST['price'],
        $_POST['quantity']
    ]);
    header("Location: index.php");
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <button>Add Product</button>
</form>

<?php include "../includes/footer.php"; ?>

