<?php
    function displayClassement(){
        include('../models/configuration.php');
        $requete = $bdd->prepare('SELECT nom, ca,taux_atteinte FROM users');
        $requete->execute();
        $reponse = $requete->fetchAll();
        return $reponse;
    }


?>