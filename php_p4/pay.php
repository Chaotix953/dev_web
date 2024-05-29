<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement de la commande</title>
    <link rel="stylesheet" href="../css/paiement.css">
</head>

<body>

<?php require 'header.php';?>

<div class="container">
    <div class="payment-box">
        <h1>Paiement de la commande</h1>
        
        <form action="">
            <fieldset>
                <legend>Adresse de livraison</legend>
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" required>
                </div>
                <div class="form-group">
                    <label for="ville">Ville:</label>
                    <input type="text" id="ville" name="ville" required>
                </div>
                <div class="form-group">
                    <label for="pays">Pays:</label>
                    <input type="text" id="pays" name="pays" required>
                </div>
                <div class="form-group">
                    <label for="code-postal">Code postal:</label>
                    <input type="text" id="code-postal" name="code-postal" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Informations de paiement</legend>
                <div class="form-group">
                    <label for="nom-carte">Nom sur la carte:</label>
                    <input type="text" id="nom-carte" name="nom-carte" required>
                </div>
                <div class="form-group">
                    <label for="numero-carte">Numéro de carte:</label>
                    <input type="text" id="numero-carte" name="numero-carte" required>
                </div>
                <div class="form-group">
                    <label for="date-expiration">Date d'expiration:</label>
                    <input type="text" id="date-expiration" name="date-expiration" placeholder="MM/AA" required>
                </div>
                <div class="form-group half-width">
                    <label for="code-securite">Code de sécurité:</label>
                    <input type="text" id="code-securite" name="code-securite" required>
                </div>
            </fieldset>

            <input type="submit" value="Valider le paiement" class="submit-button">
        </form>
    </div>
</div>

<?php require 'footer.php';?>

</body>
</html>
