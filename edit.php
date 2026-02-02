<?php
require "../config/db.php";
require "../includes/auth.php";

include "../includes/header.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update = $pdo->prepare(
        "UPDATE products SET product_name=?, category=?, price=?, quantity=? WHERE id=?"
    );
    $update->execute([
        $_POST['name'],
        $_POST['category'],
        $_POST['price'],
        $_POST['quantity'],
        $id
    ]);
    header("Location: index.php");
}
?>

<form method="POST">
    <input type="text" name="name" value="<?= $product['product_name'] ?>" required>
    <input type="text" name="category" value="<?= $product['category'] ?>" required>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
    <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required>
    <button>Update Product</button>
</form>

<?php include "../includes/footer.php"; ?>

