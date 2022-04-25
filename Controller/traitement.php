<?php

require_once('connexion_bdd.php');

function infoVoyage($id)
{
    global $connexion;
    $voyage = [];
    $jour = [];

    $requestVoyage = "SELECT `circuit`.`id`, `deplacement`.`planning_jour`, `deplacement`.`heure_depart`, `deplacement`.`heure_arrivee`,`deplacement`.`id_ville_depart`,`deplacement`.`id_ville_arrivee`, `ville`.`nom`
                    FROM `circuit`, `circuit_deplacement`, `deplacement`, `ville` 
                    WHERE `deplacement`.`id_ville_depart` = `ville`.`id`
                    AND `deplacement`.`id` = `circuit_deplacement`.`id_deplacement`
                    AND circuit.id = circuit_deplacement.id_circuit
                    AND `circuit_deplacement`.`id_circuit` = ? 
                    ORDER BY `deplacement`.`id` ASC";
    $resultVoyage = $connexion->prepare($requestVoyage);
    $resultVoyage->bind_param("i", $id);
    $resultVoyage->execute();
    $resultVoyage->bind_result($id, $planning_jour, $heure_depart, $heure_arrivee, $id_ville_depart, $id_ville_arrivee, $villedepart);

    if (!$resultVoyage) {
        return null;
    } else {
        $c = 1;
        while ($resultVoyage->fetch()) {
            $jour['planing'] = $planning_jour;
            $jour['depart'] = $heure_depart;
            $jour['arrivee'] = $heure_arrivee;
            $jour['villedepart'] = $villedepart;
            $jour['idvillearrivee'] = $id_ville_arrivee;
            $voyage['jour'.$c] = $jour;
            $c += 1;
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

function infoReservation($id)
{
    global $connexion;
    $info = [];

    $request = "SELECT `nombre_place_total`,`date_debut`,`date_fin`,`prix` 
                FROM `circuit` 
                WHERE id = ? ";
    $result = $connexion->prepare($request);
    $result->bind_param("i", $id);
    $result->execute();
    $result->bind_result($nombre_place_total, $date_debut, $date_fin, $prix);

    if (!$result) {
        return null;
    } else {
        while ($result->fetch()) {
            $info["nbplace"] = $nombre_place_total;
            $info["datedebut"] = $date_debut;
            $info["datefin"] = $date_fin;
            $info["prix"] = $prix;
        }
        return $info;
    }
}

function circuit($id)
{
    global $connexion;
    $circuitp = [];
    $reservation = [];

    $request = "SELECT `circuit`.`nom`, `circuit`.`nombre_place_total`, `circuit`.`date_debut`, `circuit`.`date_fin`, `circuit`.`prix`, `utilisateur_circuit`.`id`,`utilisateur_circuit`.`date_reservation` 
                FROM `circuit`, `utilisateur_circuit`
                WHERE `utilisateur_circuit`.`id_circuit` = `circuit`.`id` 
                AND `utilisateur_circuit`.`id_utilisateur` = ? ";
    $result = $connexion->prepare($request);
    $result->bind_param("i", $id);
    $result->execute();
    $result->bind_result($nom, $place, $dated ,$datef, $prix, $idreservation ,$dater);

    if (!$result) {
        return null;
    } else {
        while ($result->fetch()) {
            $circuitp["nom"] = $nom;
            $circuitp["nombre_place_total"] = $place;
            $circuitp["date_debut"] = $dated;
            $circuitp["date_fin"] = $datef;
            $circuitp["prix"] = $prix;
            $circuitp["date_reservation"] = $dater;
            $reservation[$idreservation] = $circuitp;
        }
        return $reservation;
    }
}