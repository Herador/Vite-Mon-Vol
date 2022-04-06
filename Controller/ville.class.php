<?php

require_once('C:\wamp64\www\Vite-Mon-Vol\Controller\connexion_bdd.php');

class ajoutville
{
    public function __construct($nom, $hotel)
    {
        global $connexion;

        $requete =   "INSERT INTO `ville`( `nom`, `hotel`) VALUES (?,?)";
        $result = $connexion->prepare($requete);
        $result->bind_param("ss", $nom, $hotel);
        $result->execute();
    }
}
