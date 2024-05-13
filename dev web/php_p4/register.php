<?php
session_start();

// Database connection
$dsn = 'mysql:dbname=shoose;host=91.160.58.250;port=49153';
$username = 'root';
$password = 'raspberry';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['register_error'] = "Username already exists.";
        header('Location: register.php');
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        $_SESSION['register_success'] = "Registration successful. Please login.";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['register_error'] = "Registration failed. Please try again.";
        header('Location: register.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de recherche</title>
    <meta charset=”utf-8″>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/connexion.css">


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
        if (isset($_SESSION['username'])) { ?>
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
</header>


<div class="">

    <form action="" method="post">
         <span class="error text-danger"><?php
             echo isset($_SESSION['login_error']) ? $_SESSION['login_error'] : ''; ?></span>
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input class="form-control" type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input class="form-control" type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input class="form-control" type="password" id="password" name="password" required>
        </div>
        <button type="submit">Connexion</button>
        <a class="" href="/login.php">login</a>
    </form>
</div>
</body>
</html>
