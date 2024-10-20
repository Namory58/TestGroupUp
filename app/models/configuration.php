<?php
    $servername = "db"; 
    $username = "user"; 
    $password = "password"; 
    $database = "groupupdb"; 

    $bdd = new mysqli($servername, $username, $password, $database);

    if ($bdd->connect_error) {
        die("Connection failed: " . $bdd->connect_error);
    }

    $tableCheck = $bdd->query("SHOW TABLES LIKE 'users'");
    $tableExists = $tableCheck->num_rows > 0;

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