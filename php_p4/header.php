<?php
require './db.php';

$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolePied</title>
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>
    <header class="header">
        <div id="navbar" class="nvbar">
            <img src="../img/logo.jpg" class="logo" alt="SolePied Logo">
            <ul class="nav-list">
                <li><a href="./index.php">Accueil</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Produits</a>
                    <div class="dropdown-content">
                        <?php foreach ($categories as $category) { ?>
                            <a href="./product.php?cat=<?php echo $category['id'] ?>"><?php echo $category['name']; ?></a>
                        <?php } ?>
                    </div>
                </li>        
                <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="./panier.php">Panier</a></li>  
                    <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                    <li><a href="./login.php">Connexion</a></li>
                <?php }

                if (isset($_SESSION['user']) && isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin']) { ?>
                    <li><a href="./categories.php">Gestion Categories</a></li>
                    <li><a href="./products.php">Gestion Products</a></li>
                <?php } ?>
            </ul>
        </div>
    </header>
</body>
</html>
