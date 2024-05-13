<?php
$dsn = 'mysql:dbname=shoose;host=91.160.58.250;port=49153';
$username = 'root';
$password = 'raspberry';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}
