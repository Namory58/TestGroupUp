<?php 
  $bdd = new PDO("mysql:host=localhost;dbname=groupupdb;charset=utf8;port=3306", "root", "");
try 
    {
        $bdd = new PDO("mysql:host=localhost;dbname=groupupdb;charset=utf8", "root", "");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $tableCheck = $bdd->query("SHOW TABLES LIKE 'users'");
    $tableExists = $tableCheck->rowCount() > 0;

    if (!$tableExists) {
        $createTableQuery = "
            CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(100) NOT NULL,
                ca DECIMAL(10,2) NOT NULL,
                objectif DECIMAL(10,2),
                taux_atteinte DECIMAL(5,2)
            )";
        $bdd->query($createTableQuery);
    }
?>
