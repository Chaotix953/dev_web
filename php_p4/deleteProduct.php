<?php
require './db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM Product WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Product deleted successfully.";
        header('Location: products.php');
    } else {
        echo "Error deleting product.";
        header('Location: products.php');
    }
}
