<html>

<head>
    <title>Paiement de la commande</title>
    <link rel="stylesheet" href="../css/paiement.css">
    <meta charset=”utf-8″>
</head>

<body>

<?php require 'header.php';?>

<div class="groscarre">
    <h1>Paiement de la commande</h1>
    
    <form action="">
        <fieldset>
            <legend>Adresse de livraison</legend>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse">
            </div>
            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville">
            </div>
            <div class="form-group">
                <label for="pays">Pays:</label>
                <input type="text" id="pays" name="pays">
            </div>
            <div class="form-group">
                <label for="code-postal">Code postal:</label>
                <input type="text" id="code-postal" name="code-postal">
            </div>
        </fieldset>

        <fieldset>
            <legend>Informations de paiement</legend>
            <div class="form-group">
                <label for="nom-carte">Nom sur la carte:</label>
                <input type="text" id="nom-carte" name="nom-carte">
            </div>
            <div class="form-group">
                <label for="numero-carte">Numéro de carte:</label>
                <input type="text" id="numero-carte" name="numero-carte">
            </div>
            <div class="form-group">
                <label for="date-expiration">Date d'expiration:</label>
                <input type="text" id="date-expiration" name="date-expiration">
            </div>
            <div class="form-group half-width">
                <label for="code-securite">Code de sécurité:</label>
                <input type="text" id="code-securite" name="code-securite">
            </div>
        </fieldset>

        <input type="submit" value="Valider le paiement">
    </form>

</div>

<?php require 'footer.php';?>

</body>
</html>
