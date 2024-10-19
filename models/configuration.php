<?php
$bdd = new PDO("mysql:host=localhost;dbname=groupupdb;charset=utf8;port=3306", "root", "");
try {
    $bdd = new PDO("mysql:host=localhost;dbname=groupupdb;charset=utf8", "root", "");
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>