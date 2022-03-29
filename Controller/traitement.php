<?php

require_once('connexion_bdd.php');

function infoVoyage($id)
{
    global $connexion;
    $voyage = [];
    $jour = [];

    $requestVoyage = "SELECT `circuit`.`nom`, `deplacement`.`planning_jour`,`deplacement`.`nombre_etape`, `deplacement`.`heure_depart`, `deplacement`.`heure_arrivee`,`deplacement`.`id_ville_depart`,`deplacement`.`id_ville_arrivee`, `ville`.`nom`
                    FROM `circuit`, `circuit_deplacement`, `deplacement`, `ville` 
                    WHERE `deplacement`.`id_ville_depart` = `ville`.`id`
                    AND `deplacement`.`id` = `circuit_deplacement`.`id_deplacement`
                    AND circuit.id = circuit_deplacement.id_circuit
                    AND `circuit_deplacement`.`id_circuit` = ? ";
    $resultVoyage = $connexion->prepare($requestVoyage);
    $resultVoyage->bind_param("i", $id);
    $resultVoyage->execute();
    $resultVoyage->bind_result($nom, $planning_jour, $nombre_etape ,$heure_depart, $heure_arrivee, $id_ville_depart, $id_ville_arrivee, $villedepart);

    if (!$resultVoyage) {
        return null;
    } else {
        while ($resultVoyage->fetch()) {
            $voyage['nom'] = $nom;
            $jour['idjour'] = $nombre_etape;
            $jour['planing'] = $planning_jour;
            $jour['depart'] = $heure_depart;
            $jour['arrivee'] = $heure_arrivee;
            $jour['villedepart'] = $villedepart;
            $jour['idvillearrivee'] = $id_ville_arrivee;
            $voyage['jour'.$nombre_etape] = $jour;
        }
        return $voyage;
    }
}

function infoville($id)
{
    global $connexion;
    $ville = [];

    $requestville = "SELECT deplacement.`id_ville_arrivee`, ville.nom, ville.hotel 
                    FROM deplacement, ville, circuit_deplacement 
                    WHERE id_ville_arrivee = ville.id 
                    AND circuit_deplacement.id_deplacement = deplacement.id   
                    AND circuit_deplacement.id_circuit = ? ";
    $resultville = $connexion->prepare($requestville);
    $resultville->bind_param("i", $id);
    $resultville->execute();
    $resultville->bind_result($id_ville_arrivee, $villearrivee, $hotel);

    if (!$resultville) {
        return null;
    } else {
        while ($resultville->fetch()) {
            $ville['villearrivee'.$id_ville_arrivee] = $villearrivee;
            $ville['hotel'.$id_ville_arrivee] = $hotel;
        }
        return $ville;
    }
}

function infoIngredient($id)
{
    global $connexion;
    $ingredients = [];

    $request = "SELECT `quantite`, `ingredient`.`nom` 
    FROM`recette_ingredient`
    INNER JOIN `ingredient` on `recette_ingredient`.`idIngredient` = `ingredient`.`id` 
    WHERE `recette_ingredient`.`idRecette` = ? ";
    $result = $connexion->prepare($request);
    $result->bind_param("i", $id);
    $result->execute();
    $result->bind_result($quantite, $nomIngredient);

    if (!$result) {
        return null;
    } else {
        while ($result->fetch()) {
            $ingredients[$nomIngredient] = $quantite;
        }
        return $ingredients;
    }
}
