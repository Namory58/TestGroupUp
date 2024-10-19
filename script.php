<?php
include("./models/configuration.php");
if ($argc !== 2) {
    die("Le format du fichier est incorrect. Utilisation : php script.php <le fichier.csv>\n");
}
$filename = $argv[1];
if (!file_exists(filename: $filename)) {
    die("Erreur: Le fichier $filename n'existe pas.\n");
}
$bdd->exec("TRUNCATE TABLE users"); //Supprimer tous les élements de la base de données

$fileObjectifs = 'data/objectifs.csv';
$file2 = fopen($fileObjectifs, 'r');
$dataCA = [];

if ((($file = fopen($filename, 'r')) && ($fileObjetfs = fopen( $fileObjectifs,  'r'))) !== false) {
    while (

        ($data = fgetcsv($file, 1000,  ';')) &&
        ($dataobjectifs = fgetcsv($fileObjetfs, 1000,  ';')

        ) !== false
    ) {
        if ($data[0] === $dataobjectifs[0]) {
            array_push(
                $dataCA,
                [
                    'nom' => $data[0],
                    'ca' => (float) $data[1],
                    'objectif' => $dataobjectifs[1]
                ]
            );
        }

    }

}
fclose($file);

usort($dataCA, function ($userOne, $userTwo) {
    return $userTwo['ca'] <=> $userOne['ca'];
});

//insertion dans ma database 

foreach($dataCA as $row){
    $requete = $bdd->prepare("INSERT INTO users (nom, ca,objectif,taux_atteinte) VALUES (:nom, :ca,:objectif,:taux_atteinte)");
    $taux = ($row['ca'] / $row['objectif']) * 100;
    $requete->execute([
        'nom' => $row['nom'],
        'ca'=>$row['ca'],
        'objectif'=>$row['objectif'],
        'taux_atteinte'=>$taux
    ]);
}

print_r($dataCA);
//$requete = $bdd->prepare("INSERT INTO users (nom, ca,objectif,taux_atteinte) VALUES (:nom, :ca,:objectif,:taux_atteinte)"
?>