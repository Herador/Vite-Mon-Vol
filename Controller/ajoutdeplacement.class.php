<?php
require_once('C:\wamp64\www\Vite-Mon-Vol\Controller\connexion_bdd.php');

class ajoutdeplacement{

    
    public function __construct($planning_jour, $heure_depart, $heure_arrivee, $ville_depart, $ville_arrivee)
    {
        global $connexion;
        
        $requete2 = "INSERT INTO `deplacement`( `planning_jour`, `heure_depart`, `heure_arrivee`, `id_ville_depart`, `id_ville_arrivee`) 
                    VALUES (?,?,?,?,?)";
        
        $result = $connexion->prepare($requete2);
        $result->bind_param("sssss", $planning_jour, $heure_depart, $heure_arrivee, intval($ville_depart), intval($ville_arrivee));
        $result->execute();

    }
}