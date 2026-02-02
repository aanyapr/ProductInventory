<?php
require "../config/db.php";
require "../includes/auth.php";

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");

