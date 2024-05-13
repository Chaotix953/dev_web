<?php
session_start();

if (!isset($_SESSION['user']['pannier']) || !isset($_POST['product_ref'])) {
    header('Location: panier.php');
    exit();
}

$productRef = $_POST['product_ref'];

$_SESSION['user']['pannier'] = array_filter($_SESSION['user']['pannier'], function ($item) use ($productRef) {
    return $item['reference'] !== $productRef;
});

header('Location: panier.php');
exit();
?>
