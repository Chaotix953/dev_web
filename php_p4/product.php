<?php
require "./db.php";
session_start();
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['cat']) && !is_null($_GET['cat'])) {
    $stmt = $pdo->prepare("select * FROM product WHERE category_id = :id");
    $stmt->bindParam(':id', $_GET['cat']);
    if ($stmt->execute()) {
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!isset($_SESSION['user']['pannier'])) {
    $_SESSION['user']['pannier'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = filter_input(INPUT_POST, 'product_id');
    $quantity = filter_input(INPUT_POST, 'quantity');

    if ($productId && $quantity > 0) {

        $_SESSION['user']['pannier'][] = [
            'reference' => $productId,
            'quantity' => $quantity
        ];

        header("Location: panier.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de recherche</title>
    <link rel="stylesheet" href="../css/product.css">
</head>
<body>
    <?php require 'header.php';?>

    <div class="nvbar">
        <ul>
            <?php foreach ($categories as $category) { ?>
                <li><a href="./product.php?cat=<?php echo $category['id'] ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <main>
        <?php foreach ($products as $index => $product) { ?>
            <div class="product">
                <div class="zoom-container">
                    <img src="<?php echo $product['photo']; ?>" alt="Image du produit" class="zoomable-image">
                    <div class="zoom-details"></div>
                </div>
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['designation']; ?></p>
                <p>Réference vendeur: <?php echo $product['reference']; ?></p>
                <p class="price">$<?php echo $product['price']; ?></p>
                <button class="toggle-stock" onclick="toggleStock(this)">Voir le stock</button>
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
        <?php } ?>
    </main>

    <script>
        function toggleStock(button) {
            var stockElement = button.nextElementSibling;
            stockElement.classList.toggle('hidden');
        }

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

