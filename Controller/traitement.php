<?php

require_once('connexion_bdd.php');

function infoJapon($id)
{
    global $connexion;
    $info = [];

    $requestEtape = "SELECT `circuit`.`nom`, `deplacement`.`planning_jour`, `deplacement`.`heure_depart`, `deplacement`.`heure_arrivee`, `ville`.`nom`, `ville`.`hotel` 
                     FROM `circuit`, `circuit_deplacement`, `deplacement`, `ville` 
                     WHERE `deplacement`.`id_ville_depart` = `ville`.`id` AND `deplacement`.`id_ville_arrivee`= `ville`.`id` 
                     AND `deplacement.id` = `circuit_deplacement`.`id_deplacement` 
                     AND `circuit_deplacement`.`id_deplacement` = `circuit_deplacement`.`id_circuit`
                     AND `circuit`.`id` = ? ";
    $resultEtape = $connexion->prepare($requestEtape);
    $resultEtape->bind_param("i", $id);
    $resultEtape->execute();
    $resultEtape->bind_result($nom, $difficulte);

    if (!$resultEtape) {
        return null;
    } else {
        while ($resultEtape->fetch()) {
            $info['nom'] = $nom;
            $info['difficulte'] = $difficulte;
        }
        return $info;
    }
}

function infoEtape($id)
{
    global $connexion;
    $tab = [];

    $requestEtape = "SELECT `numero`, `description` 
                     FROM `etape` 
                     WHERE `idRecette` = ? ";
    $resultEtape = $connexion->prepare($requestEtape);
    $resultEtape->bind_param("i", $id);
    $resultEtape->execute();
    $resultEtape->bind_result($numero, $description);

    if (!$resultEtape) {
        return null;
    } else {
        while ($resultEtape->fetch()) {
            $tab[$numero] = $description;
        }
        return $tab;
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
