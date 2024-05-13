<html>

<head>
    <title>Paiement de la commande</title>
    <link rel="stylesheet" href="../css/paiement.css">
    <meta charset=”utf-8″>
</head>
<body>
<header>
    <img src="../img/logo.jpg" class="logo">
    <h1> solepied </h1>
    <div class="head" style="display: flex">
        <a style="margin: 2px" href="./index.php">Accueil</a>
        <a  style="margin: 2px" href="#">Nouveautés</a>
        <a  style="margin: 2px" href="./product.php">Produits</a>
        <?php
        if (isset($_SESSION['username'])) { ?>
            <a  style="margin-right: 2px" href="logout.php">logout</a>
            <?php
        } else { ?>
            <a  style="margin-right: 2px" href="./login.php">connexion</a>
            <?php
        } ?>
        <a  style="margin-right: 2px" href="./panier.php">Panier</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/script2.js"></script>z
</header>

<br>
<br>
<br>
<div class="groscarre">
    <h1>Paiement de la commande</h1>
    <form action="">
        <fieldset>
            <legend>Adresse de livraison</legend>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom"><br>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom"><br>

            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse"><br>

            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville"><br>

            <label for="pays">Pays:</label>
            <input type="text" id="pays" name="pays"><br>

            <label for="code-postal">Code postal:</label>
            <input type="text" id="code-postal" name="code-postal"><br>
        </fieldset>

        <fieldset>
            <legend>Informations de paiement</legend>
            <label for="nom-carte">Nom sur la carte:</label>
            <input type="text" id="nom-carte" name="nom-carte"><br>

            <label for="numero-carte">Numéro de carte:</label>
            <input type="text" id="numero-carte" name="numero-carte"><br>

            <label for="date-expiration">Date d'expiration:</label>
            <input type="text" id="date-expiration" name="date-expiration"><br>
            <style>
                .code{
                    width: 40%; /*réduire la taille du rectangle contenant le code HTML à 40% de la largeur de son conteneur parent*/
                }
            </style>

            <div class="code">
                <label for="code-securite">Code de sécurité:</label>
                <input type="text" id="code-securite" name="code-securite">
            </div>
            <br>
        </fieldset>

        <input type="submit" value="Valider le paiement">
    </form>
</div>
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
