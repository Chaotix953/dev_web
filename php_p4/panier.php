<?php
session_start();
require "./db.php";

$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM Product");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$selectedProducts = [];
$total = 0;
if (isset($_SESSION['user']['pannier'])) {
    foreach ($_SESSION['user']['pannier'] as $item) {
        $productId = $item['reference'];
        foreach ($products as $product) {
            if ($product['reference'] === $productId) {
                $selectedProducts[] = array_merge($product, ['selected_quantity' => $item['quantity']]);
                $total += $item['quantity'] * $product['price'];
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Panier</title>
    <link rel="stylesheet" href="../css/panier.css">
</head>

<body>
    <?php require 'header.php'; ?>

    <?php foreach ($selectedProducts as $prd) { ?>
        <div class="cart-items">
            <img src="<?php echo $prd['photo']; ?>" width="250px" height="250px" alt="Produit 1">
            <div class="sousclass" style="margin-left: 50px;">
                <h3><?php echo $prd['name']; ?></h3>
                <p><label for="price">Prix: <?php echo $prd['price']; ?>€</label></p>
                <p><label for="quantite">Quantité: <?php echo $prd['selected_quantity']; ?></label></p>
                <form action="delete_from_cart.php" method="post">
                    <input type="hidden" name="product_ref" value="<?php echo $prd['reference']; ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    <?php } ?>
    <div class="payer">
        <p>Valeur de la commande : <?php echo $total; ?>€</p>
        <p>Prix de la livraison : <?php echo $total; ?>€</p>
        <p>Le total de la commande : <?php echo $total; ?>€</p>
        <button><a href="./pay.php">Terminer la commande</a></button>
        <p><img src="../img/mode de paiement.PNG" width="400px" height="100px" alt=""></p>
    </div>


    <?php require 'footer.php'; ?>

</body>

</html>