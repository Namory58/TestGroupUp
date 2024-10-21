<?php
    function displayClassement(){
        include('../models/configuration.php');
        $requete = $bdd->query('SELECT nom, ca, taux_atteinte FROM users');
        $reponse = $requete->fetchAll();
        return $reponse;
    }
?>
