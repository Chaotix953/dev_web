<!DOCTYPE html>
<html>
<head>
    <title>my first website</title>
    <link rel="stylesheet" href="../css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"></script>
    <meta charset=”utf-8″>
</head>
<body>
<div class="banner">
    <div class="nvbar">
        <img src="../img/logo.jpg" class="logo">
        <ul>
            <li><a href="./index.php">Accueil</a></li>
            <li>
                <div class="dropdown">
                    <p>Produits</p>
                    <div class="dropdown-content">
                        <a href="./product.php?cat=ville">Chaussures de ville</a>
                        <a href="./product.php?cat=sport">Running</a>
                        <a href="./product.php?cat=sandales">Chaussures d'été</a>
                    </div>
                </div>
            </li>

            <li><a href="#">nouveautés</a></li>

            <li><a href="./panier.php">Panier</a></li>
            <?php
            if (isset($_SESSION['user'])) { ?>
                <li><a href="logout.php">logout</a></li>
                <?php
            } else { ?>
                <li><a href="./login.php">connexion</a></li>
                <?php
            } ?>
        </ul>
    </div>