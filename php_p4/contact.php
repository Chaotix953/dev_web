<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['firstName'])) {
        $errors['firstName'] = 'Le prénom est requis.';
    }


    if (empty($_POST['lastName'])) {
        $errors['lastName'] = 'Le nom est requis.';
    }


    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Une adresse email valide est requise.';
    }


    if (empty($_POST['gender'])) {
        $errors['gender'] = 'Le genre est requis.';
    }

    if (empty($_POST['occupation'])) {
        $errors['occupation'] = 'Le métier est requis.';
    }


    if (empty($_POST['dob'])) {
        $errors['dob'] = 'La date de naissance est requise.';
    }


    if (empty($_POST['subject'])) {
        $errors['subject'] = 'Le sujet est requis.';
    }


    if (empty($_POST['message'])) {
        $errors['message'] = 'Le contenu du mail est requis.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"></script>

    <title>Service client</title>
    <link rel="stylesheet" href="../css/contact.css">
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

<main>
    <section id="Service client"> <!--deux sections distinctes,-->
        <h2>Service client</h2>
        <p>
            Notre équipe de service client est là pour répondre à toutes vos questions et vous aider à résoudre tout
            problème que vous pourriez rencontrer.
            Nous avons rassemblé ici quelques informations qui pourraient vous être utiles : <br> <br>


            <b> Politique de retour : </b>Si vous n'êtes pas entièrement satisfait de votre achat, vous avez la
            possibilité de le retourner dans un délai de 10 jours. Veuillez noter que les frais de retour sont à votre
            charge. <br>
            <b> Politique de remboursement : </b> Si vous remplissez les conditions pour un remboursement, nous vous
            rembourserons le montant total de votre achat dans un délai de 5 jours. <br>
            <b> Service après-vente : </b> Notre équipe dédiée au service après-vente est là pour vous aider en cas de
            problème avec votre produit après l'achat. N'hésitez pas à nous contacter pour toute assistance
            supplémentaire. <br>
            <b> Heures d'ouverture : </b>Notre équipe est disponible du lundi au vendredi, de 9h à 18h. Veuillez noter
            que nous sommes fermés le week-end ainsi que les jours fériés.<br> <br>
            Nous sommes présents à chaque étape de votre processus d'achat pour vous offrir notre aide et notre soutien.
            N'hésitez pas à nous contacter si vous avez la moindre question ou la moindre préoccupation.</p>
    </section>

    <section id="Contactez-nous" class="container mt-5">
        <h2 class="text-center mb-4">Contactez-nous</h2>
        <form id="contactForm" action="contact.php" method="post">
            <div class="form-group">
                <label for="firstName">Prénom:</label>
                <input type="text" id="firstName" name="firstName" class="form-control">
                <span class="error text-danger"><?php
                    echo isset($errors['firstName']) ? $errors['firstName'] : ''; ?></span> <!-- Message d'erreur -->
            </div>
            <div class="form-group">
                <label for="lastName">Nom:</label>
                <input type="text" id="lastName" name="lastName" class="form-control">
                <span class="error text-danger"><?php
                    echo isset($errors['lastName']) ? $errors['lastName'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
                <span class="error text-danger"><?php
                    echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label>Genre:</label>
                <div class="form-check">
                    <input type="radio" id="male" name="gender" value="male" class="form-check-input">
                    <label for="male" class="form-check-label">Homme</label>
                    <span class="error text-danger"><?php
                        echo isset($errors['gender']) ? $errors['gender'] : ''; ?></span>
                </div>
                <div class="form-check">
                    <input type="radio" id="female" name="gender" value="female" class="form-check-input">
                    <label for="female" class="form-check-label">Femme</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="other" name="gender" value="other" class="form-check-input">
                    <label for="other" class="form-check-label">Autre</label>
                </div>
            </div>
            <div class="form-group">
                <label for="occupation">Métier:</label>
                <select id="occupation" name="occupation" class="form-control">
                    <option value="">Choisissez...</option>
                    <option value="etudiant">Étudiant</option>
                    <option value="professionnel">Professionnel</option>
                    <option value="autre">Autre</option>
                </select>
                <span class="error text-danger"><?php
                    echo isset($errors['occupation']) ? $errors['occupation'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="dob">Date de Naissance:</label>
                <input type="date" id="dob" name="dob" class="form-control">
                <span class="error text-danger"><?php
                    echo isset($errors['dob']) ? $errors['dob'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="subject">Sujet du Mail:</label>
                <input type="text" id="subject" name="subject" class="form-control">
                <span class="error text-danger"><?php
                    echo isset($errors['subject']) ? $errors['subject'] : ''; ?></span>
            </div>
            <div class="form-group">
                <label for="message">Contenu du Mail:</label>
                <textarea id="message" name="message" class="form-control"></textarea>
                <span class="error text-danger"><?php
                    echo isset($errors['message']) ? $errors['message'] : ''; ?></span>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</main>


<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>Plan du site</h3>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Chaussures de ville</a></li>
                <li><a href="#">Sneakers</a></li>
                <li><a href="#">Contact</a></li>
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