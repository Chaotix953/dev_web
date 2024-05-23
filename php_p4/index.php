<?php
session_start();
require 'db.php';

function getCategories($pdo)
{
    $stmt = $pdo->prepare("SELECT id, name FROM categories");
    $stmt->execute();
    return $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolePied</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <?php require_once './header.php'; ?>
    
    <div class="content">
        <h1>Parce que chaque pied<br><span class="under"> mérite le meilleur.</span></h1>
        <p>Faites un pas vers le style - commandez vos chaussures de rêve aujourd'hui!<br> Solepied </p>
        <div>
            <a href="../php_p4/page_recherche.php" class="button">Découvrez nos produits</a>
        </div>
    </div>

    <ol class="menu-vertical">
        <h2>Menu</h2>
        <li><a href="./index.php">Accueil</a></li>
        <?php 
        $categories = getCategories($pdo);
        foreach ($categories as $category) : ?>
            <li><a href="./product.php?cat=<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></a></li>
        <?php endforeach; ?>
        <li><a href="./contact.php">Contact</a></li>
    </ol>

    <?php require_once 'footer.php'; ?>
</body>

</html>
