<?php
$bdd = new PDO("mysql:host=localhost;dbname=groupupdb;charset=utf8;port=3306", "user", "password");
try {
    $bdd = new PDO("mysql:host=localhost;dbname=groupupdb;charset=utf8", "user", "password");
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>