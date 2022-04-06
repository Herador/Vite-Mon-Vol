<?php
session_start();
require_once('connexion_bdd.php');

$colonne = htmlspecialchars($_GET['col']);
$modif = htmlspecialchars($_POST['modif']);
$id = htmlspecialchars($_GET['id']);

switch ($colonne) {
    case "nom":
        $requete = "UPDATE `utilisateur` 
                    SET nom = ?
                    WHERE `utilisateur`.`id` = ? ";
        break;
    case "prenom":
        $requete = "UPDATE `utilisateur` 
                    SET prenom = ?
                    WHERE `utilisateur`.`id` = ? ";
        break;
    case "mail":
        $requete = "UPDATE `utilisateur` 
                    SET mail = ?
                    WHERE `utilisateur`.`id` = ? ";
        break;
    case "mdp":
        $requete = "UPDATE `utilisateur` 
                    SET mdp = ?
                    WHERE `utilisateur`.`id` = ? ";
                    break;
}
$result = $connexion->prepare($requete);
$result->bind_param("si", $modif, intval($id));
$result->execute();

$_SESSION[$colonne] = $modif;
header('Location:../View/profil.php');
