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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" href="../css/panier.css">
</head>
<body>
    <?php require 'header.php'; ?>

    <main class="container">
        <h1>Votre Panier</h1>
        <?php if (empty($selectedProducts)) { ?>
            <p>Votre panier est vide.</p>
        <?php } else { ?>
            <?php foreach ($selectedProducts as $prd) { ?>
                <div class="cart-item">
                    <img src="<?php echo $prd['photo']; ?>" alt="Produit 1" class="product-image">
                    <div class="item-details">
                        <h3><?php echo $prd['name']; ?></h3>
                        <p>Prix: <?php echo $prd['price']; ?>€</p>
                        <p>Quantité: <?php echo $prd['selected_quantity']; ?></p>
                        <form action="delete_from_cart.php" method="post">
                            <input type="hidden" name="product_ref" value="<?php echo $prd['reference']; ?>">
                            <button type="submit" class="remove-button">Supprimer</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
            <div class="order-summary">
                <h2>Résumé de la commande</h2>
                <p>Valeur de la commande : <?php echo $total; ?>€</p>
                <p>Prix de la livraison : 10.00€</p>
                <p>Le total de la commande : <?php echo $total + 10; ?>€</p>
                <a href="./pay.php" class="checkout-button">Terminer la commande</a>
                <p><img src="../img/mode_de_paiement.png" alt="Modes de paiement"></p>
            </div>
        <?php } ?>
    </main>

    <?php require 'footer.php'; ?>

</body>
</html>
