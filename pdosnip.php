<?php

$host = '127.0.0.1';
$db   = 'ToDo';
$user = 'igor';
$pass = 'bigor';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "An error has occured";
}




