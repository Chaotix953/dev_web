<?php
require './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
    $stmt->bindParam(':name', $name);

    if ($stmt->execute()) {
        echo "Category created successfully.";
        header('Location: categories.php');
    } else {
        header('Location: categories.php');
    }
}
?>