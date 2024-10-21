<?php
    include('./models/configuration.php');
    $filename = 'data.csv';
    $bdd->query("TRUNCATE TABLE users"); 
    $fileObjectifs = 'objectifs.csv'; 
    $dataCA = [];

    if (($file = fopen($filename, 'r')) !== false && ($fileObjetifs = fopen($fileObjectifs, 'r')) !== false) {
        while (($data = fgetcsv($file, 1000, ';')) !== false && ($dataobjectifs = fgetcsv($fileObjetifs, 1000, ';')) !== false) {
            if ($data[0] === $dataobjectifs[0]) {
                array_push($dataCA, [
                    'nom' => $data[0],
                    'ca' => (float) $data[1],
                    'objectif' => (float) $dataobjectifs[1] 
                ]);
            }
        }
        fclose($file);
        fclose($fileObjetifs);
    }

    usort($dataCA, function ($userOne, $userTwo) {
        return $userTwo['ca'] <=> $userOne['ca'];
    });

    foreach ($dataCA as $row) {
        $taux = ($row['ca'] / $row['objectif']) * 100;

        $requete = $bdd->prepare("INSERT INTO users (nom, ca, objectif, taux_atteinte) VALUES (?, ?, ?, ?)");

        $requete->execute([$row['nom'], $row['ca'], $row['objectif'], $taux]);
    }

    // Print the sorted data
    die("Creation de la database avec succès");
?>

