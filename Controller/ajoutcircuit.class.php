<?php
require_once('C:\wamp64\www\Vite-Mon-Vol\Controller\connexion_bdd.php');

class ajoutcircuit
{
    public function __construct($nom, $description,$nombreplace,$dated,$datef,$prix)
    {
        global $connexion;

        $requete1 = "INSERT INTO `circuit`( `nom`, `description`, `nombre_place_total`, `date_debut`, `date_fin`, `prix`) VALUES (?,?,?,?,?,?)";
        $result = $connexion->prepare($requete1);
        $result->bind_param("ssissi", $nom, $description,intval($nombreplace),$dated,$datef,intval($prix));
        $result->execute();
    }
}

?>

