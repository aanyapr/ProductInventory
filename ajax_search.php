<?php
require "../config/db.php";

$keyword = $_GET['keyword'] ?? '';

if ($keyword === '') {
    // Load all products on page load
    $stmt = $pdo->query("SELECT * FROM products ORDER BY product_name ASC");
} else {
    // Filter products while typing
    $stmt = $pdo->prepare(
        "SELECT * FROM products 
         WHERE product_name LIKE ? 
         OR category LIKE ?
         ORDER BY product_name ASC"
    );
    $stmt->execute([
        "%$keyword%",
        "%$keyword%"
    ]);
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    echo "<tr>
            <td>" . htmlspecialchars($row['product_name']) . "</td>
            <td>" . htmlspecialchars($row['category']) . "</td>
            <td>Rs " . $row['price'] . "</td>
            <td>" . $row['quantity'] . "</td>
          </tr>";
}
