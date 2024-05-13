<?php
require './db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Category deleted successfully.";
        header('Location: categories.php');
    } else {
        echo "Error deleting category.";
        header('Location: categories.php');
    }
}

