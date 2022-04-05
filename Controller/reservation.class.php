<?php

require_once('connexion_bdd.php');

class reservation
{
    public function __construct($idcircuit, $id)
    {
        global $connexion;

        $requete = "SELECT `nombre_place_total`,`date_debut` FROM `circuit` WHERE = ? ";
        $result = $connexion->prepare($requete);
        $result->bind_param("i", $idcircuit);
        $result->execute();
        $result->bind_result($np, $dd);

        $np = $np - 1;

        $requete2 = "UPDATE `circuit`  SET `nombre_place_total` = $np WHERE = ? ";
        $result2 = $connexion->prepare($requete2);
        $result2->bind_param("i", $idcircuit);
        $result2->execute();
        
        $requete3 = "INSERT INTO `circuit`(`date_reservation`,`id_utilisateur`,`id_circuit`) 
                    VALUES (?, ?, ?)";
        $result3 = $connexion->prepare($requete3);
        $result3->bind_param("sii",$dd, $id, $idcircuit);
        $result3->execute();
    }
}
