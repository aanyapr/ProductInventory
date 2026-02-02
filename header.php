<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Inventory System</title>
<link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<header>
    <h1>Product Inventory System</h1>

    <?php if (isset($_SESSION['admin'])): ?>
        <nav>
            <a href="index.php">Home</a>
            <a href="add.php">Add Product</a>
            <a href="search.php">Search</a>
            <a href="logout.php">Logout</a>
        </nav>
    <?php endif; ?>
</header>
