<?php
require_once('C:\wamp64\www\Vite-Mon-Vol\Controller\connexion_bdd.php');

class ajoutdeplacement
{

    public $idcircuit;
    public $iddeplacement;

    public function __construct($planning_jour, $heure_depart, $heure_arrivee, $ville_depart, $ville_arrivee)
    {
        global $connexion;

        $requete = "INSERT INTO `deplacement`( `planning_jour`, `heure_depart`, `heure_arrivee`, `id_ville_depart`, `id_ville_arrivee`) 
                    VALUES (?,?,?,?,?)";

        $result = $connexion->prepare($requete);
        $result->bind_param("sssss", $planning_jour, $heure_depart, $heure_arrivee, intval($ville_depart), intval($ville_arrivee));
        $result->execute();
    }
    public function selectcircuit()
    {

        global $connexion;

        $requete2 = "SELECT id FROM `circuit` ORDER BY id DESC LIMIT 1";
        $result2 = $connexion->query($requete2);
        $result2 = $result2->fetch_assoc();

        $this->idcircuit = $result2["id"];
    }

    public function selectdeplacement()
    {

        global $connexion;

        $requete3 = "SELECT id FROM `deplacement` ORDER BY id DESC LIMIT 1";
        $result3 = $connexion->query($requete3);
        $result3 = $result3->fetch_assoc();

        $this->iddeplacement = $result3["id"];
    }

    public function insert()
    {

        global $connexion;
        $this->selectdeplacement();
        $this->selectcircuit();
        

        $requete4 = "INSERT INTO `circuit_deplacement`(`id_circuit`,`id_deplacement`) 
                    VALUES (?,?)";
        $result = $connexion->prepare($requete4);
        $result->bind_param("ii", $this->idcircuit,$this->iddeplacement);
        $result->execute();

    }

}
