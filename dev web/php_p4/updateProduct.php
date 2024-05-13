<?php
require './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $reference = $_POST['reference'];
    $designation = $_POST['designation'];
    $photo = $_POST['photo'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("UPDATE Product SET reference = :reference, designation = :designation, photo = :photo, price = :price, name = :name, quantity = :quantity ,category_id=:category_id WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':reference', $reference);
    $stmt->bindParam(':designation', $designation);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':category_id', $_POST['category_id']);


    if ($stmt->execute()) {
        echo "Product updated successfully.";
        header('Location: products.php');
    } else {
        echo "Error updating product.";
        header('Location: products.php');
    }
}
?>
