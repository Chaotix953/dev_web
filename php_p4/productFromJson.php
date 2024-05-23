<?php
require "./varSession.inc.php";

$products = file_get_contents("./categogyProduct.json");
$products = extractProduct(json_decode($products, true));

if (isset($_GET['cat']) && !is_null($_GET['cat'])) {
    $products = $_SESSION['products'][$_GET['cat']];
}

if (!isset($_SESSION['user']['pannier'])) {
    $_SESSION['user']['pannier'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    if ($productId && $quantity > 0) {
        $_SESSION['username']['pannier'][] = [
            'product_id' => $productId,
            'quantity' => $quantity
        ];
    }

    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de recherche</title>
    <meta charset=”utf-8″>
    <link rel="stylesheet" href="../css/page_recherche.css">

    <style>
      body {
        width: 100%;
        height: 100%;
        background-image: url(../img/bg2.jpg);
        background-size: cover;
        background-attachment: scroll;
      }
    </style>
</head>
<body>
<header>
    <img src="../img/logo.jpg" class="logo">
    <h1> solepied </h1>
    <div class="head">
        <a href="./index.php">Accueil</a>
        <a href="#">Nouveautés</a>
        <a href="./product.php">Produits</a>
        <?php
        if (isset($_SESSION['username'])) { ?>
            <li><a href="logout.php">logout</a></li>
            <?php
        } else { ?>
            <li><a href="./login.php">connexion</a></li>
            <?php
        } ?>
        <a href="./panier.php">Panier</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/script2.js"></script>
</header>

<div class="nvbar">

    <ul>

        <li><a href="./product.php?cat=ville">Chaussures de Ville</a></li>
        <li><a href="./product.php?cat=sport">Chaussures de Sport</a></li>
        <li><a href="./product.php?cat=sandales">Sandales</a></li>

    </ul>
</div>

<main>
    <?php
    foreach (
        $products
        as $index => $product
    ) { ?>
        <div class="product">
            <div class="zoom-container">
                <img src="<?php
                echo $product['photo']; ?>" alt="Image du produit 1" class="zoomable-image">
                <div class="zoom-details">
                </div>
            </div>
            <h2> <?php
                echo $product['name']; ?> </h2>
            <p> <?php
                echo $product['designation']; ?> </p>
            <p> Réference vendeur <?php
                echo $product['reference']; ?> </p>
            <p class="price"> $<?php
                echo $product['price']; ?> </p>
            <button class="toggle-stock"> Voir le stock</button>

            <p class="stock hidden">Stock: <?php echo $product['quantity']; ?></p>
    <div class="quantity" data-index="1">
        <button class="decrement" onclick="decrementQuantity(this)">-</button>
        <span class="quantity-input">0</span>
        <button class="increment" onclick="incrementQuantity(this)">+</button>
    </div>
    <form method="post" action="">
        <input type="hidden" name="quantity" value="0">
        <input type="hidden" name="product_id" value="<?php echo $product['reference']; ?>">
        <button type="submit" class="add-to-cart">Ajouter au Panier</button>
    </form>
        </div>
        <?php
    } ?>

</main>
<script>
  function incrementQuantity(button) {
    var container = button.parentNode;
    
    var quantityDisplay = container.querySelector('.quantity-input');
    
    var currentQuantity = parseInt(quantityDisplay.textContent, 10);
    
    var maxStock = parseInt(container.parentNode.querySelector('.stock').textContent.split(":")[1].trim(), 10);
    
    if (currentQuantity < maxStock) {
        currentQuantity++;
        quantityDisplay.textContent = currentQuantity;
        container.querySelector('.decrement').disabled = false;
        container.parentNode.querySelector('input[name="quantity"]').value = currentQuantity;

    }
    
    if (currentQuantity >= maxStock) {
        button.disabled = true;
    }
}

function decrementQuantity(button) {
    var container = button.parentNode;
    var quantityDisplay = container.querySelector('.quantity-input');
    var currentQuantity = parseInt(quantityDisplay.textContent, 10);
    if (currentQuantity > 0) {
        currentQuantity--;
        quantityDisplay.textContent = currentQuantity;
        
        container.querySelector('.increment').disabled = false;
        container.parentNode.querySelector('input[name="quantity"]').value = currentQuantity;

    }
    
    if (currentQuantity <= 0) {
        button.disabled = true;
    }
}

</script>
</body>
</html>
