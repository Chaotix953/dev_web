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
    header('Location:login.php');
    exit();
}


$selectedProducts = [];
$total = null;
if (isset($_SESSION['user']['pannier'])) {
    foreach ($_SESSION['user']['pannier'] as $item) {
        $productId = $item['reference'];
        foreach ($products as $product) {
            if ($product['reference'] === $productId) {
                $selectedProducts[] = array_merge($product, ['selected_quantity' => $item['quantity']]);
                $total = $total + $item['quantity'] * $product['price'];
                break;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=”utf-8″>
    <title>Panier</title>
    <link rel="stylesheet" href="../css/panier.css">
    <style>
        body {
            width: 100%;
            height: 100%;
            background-color: aliceblue;
            background-size: cover;
        }
    </style>
</head>
<body>
<header>
    <img src="../img/logo.jpg" class="logo">
    <h1> solepied </h1>
    <div class="head" style="display: flex">
        <a style="margin: 2px" href="./index.php">Accueil</a>
        <a style="margin: 2px" href="#">Nouveautés</a>
        <a style="margin: 2px" href="./product.php">Produits</a>
        <?php
        if (isset($_SESSION['user'])) { ?>
            <a style="margin-right: 2px" href="logout.php">logout</a>
            <?php
        } else { ?>
            <a style="margin-right: 2px" href="./login.php">connexion</a>
            <?php
        } ?>
        <a style="margin-right: 2px" href="./panier.php">Panier</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/script2.js"></script>
    z
</header>

<div class="nvbar">

    <ul>
        <?php foreach ($categories as $category) { ?>
            <li><a href="./product.php?cat=<?php echo $category['id'] ?>"><?php echo $category['name']; ?></a></li>
        <?php } ?>
    </ul>
</div>
<main>
    <?php foreach ($selectedProducts as $prd) { ?>
        <div class="cart-items">
            <img src="<?php echo $prd['photo']; ?>" width="250px" height="250px" alt="Produit 1">
            <div class="sousclass" style="margin-left: 50px;">
                <h3><?php echo $prd['name']; ?></h3>
                <p>
                    <label for="price">Prix: <?php echo $prd['price']; ?>€</label>
                </p>
                <p>
                    <label for="quantite">Quantité:<?php echo $prd['selected_quantity']; ?> </label>
                </p>
                <form action="delete_from_cart.php" method="post">
                    <input type="hidden" name="product_ref" value="<?php echo $prd['reference']; ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>
            <div class="sousclass1">
                <p>Total: <?php echo $total; ?> <span id="totale"></span></p>
            </div>
        </div>
    <?php } ?>
    <div class="payer">
        <p>Connectez-vous pour utiliser vos offres personnalisées !</p>
        <button id="btn1"><a href="./login.php"
                             style="color: aliceblue; font-weight:bold ; text-decoration: none; text-transform: uppercase;">Identification</a>
        </button>
        <p>valeur de la commande : <?php echo $total; ?></p>
        <p> prix de la livraison : <?php echo $total; ?></p>
        <p>le totale de la commande: <?php echo $total; ?></p>
        <button id="btn2"><a href="./pay.php"
                             style="color: aliceblue; font-weight:bold ; text-decoration: none; text-transform: uppercase;">Terminer
                la commande</a></button>
        <p><img src="../mode de paiement.PNG" width="400px" height="100px" alt=""></p>
    </div>
</main>

<script>

</script>

<br>
<br>
<br>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>Plan du site</h3>
            <ul>
                <li><a href="../html/index.html">Accueil</a></li>
                <li><a href="../html/chaussures_ville.html">Chaussures de ville</a></li>
                <li><a href="../html/chaussures_sport.html">Sneakers</a></li>
                <li><a href="../html/contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Mentions légales</h3>
            <p><a href="#">Lire les mentions</a></p>
            <p><a href="#">© 2024 SolePied. Tous droits réservés.</a></p>
        </div>
        <div class="footer-section">
            <h3>Siège social :</h3>
            <p>123 Rue de la Chaussure,
                <br>
                75000 Paris, <br>
                France</p>
        </div>
    </div>
</footer>
</body>

</html>
