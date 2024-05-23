<?php
require './db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $stmt = $pdo->prepare("UPDATE categories SET name = :name WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);

    if ($stmt->execute()) {
        echo "Category updated successfully.";
        header('Location: categories.php');
    } else {
        echo "Error updating category.";
        header('Location: categories.php');

    }
}


?>