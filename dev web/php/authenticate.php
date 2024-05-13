<?php

session_start();

$users = json_decode(file_get_contents('users.json'), true);

$username = $_POST['username'];
$password = $_POST['password'];

foreach ($users as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
        $_SESSION['user'][] = $user;
        header('Location: product.php');
        exit();
    }
}

$_SESSION['login_error']="Identifiants incorrects.";
header('Location: login.php');