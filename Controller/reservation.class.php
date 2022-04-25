<?php

require_once('connexion_bdd.php');

class reservation
{
    public $np;

    public function __construct($idcircuit, $id)
    {
        global $connexion;

        $requete = "SELECT `circuit`.`nombre_place_total` FROM `circuit` WHERE `id` = ? ";
        $result = $connexion->prepare($requete);
        $result->bind_param("i", intval($idcircuit));
        $result->execute();
        $result->bind_result($np);
        $result->fetch();

        $this->np = $np - 1;


    }
    public function add($idcircuit, $id)
    {

        global $connexion;
        
        $requete3 = "INSERT INTO `utilisateur_circuit`(`date_reservation`,`id_utilisateur`,`id_circuit`) 
        VALUES (NOW(), ?, ?)";
        $result3 = $connexion->prepare($requete3);
        $result3->bind_param("ii", intval($id), intval($idcircuit));
        $result3->execute();
    }

    public function maj($idcircuit, $np)
    {
        global $connexion;

        $requete2 = "UPDATE `circuit`  SET `circuit`.`nombre_place_total` = ? WHERE `id` = ? ";
        $result2 = $connexion->prepare($requete2);
        $result2->bind_param("ii", $np, intval($idcircuit));
        $result2->execute();
    }

    public function getNp(){
        return $this->np;
    }
}
