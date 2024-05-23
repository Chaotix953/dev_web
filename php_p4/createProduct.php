<?php
require './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reference = $_POST['reference'];
    $designation = $_POST['designation'];
    $photo = $_POST['photo'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("INSERT INTO Product (reference, designation, photo, price, name, quantity,category_id) VALUES (:reference, :designation, :photo, :price, :name, :quantity,:category_id)");
    $stmt->bindParam(':reference', $reference);
    $stmt->bindParam(':designation', $designation);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':category_id', $_POST['category_id']);

    if ($stmt->execute()) {
        echo "Product created successfully.";
        header('Location: products.php');
    } else {
        header('Location: products.php');
    }
}

