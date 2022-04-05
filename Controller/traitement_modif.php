<?php
session_start();
require_once('connexion_bdd.php');

$colonne = htmlspecialchars($_GET['col']);
$modif = htmlspecialchars($_POST['modif']); 
$id = htmlspecialchars($_GET['id']);

$requete = "UPDATE `utilisateur` 
            SET ? = ?
            WHERE `utilisateur`.`id` = ? "; 
$result = $connexion->prepare($requete);
$result->bind_param("ssi", $colonne, $modif, $id);
$result->execute();

$_SESSION[$colonne] = $modif;
header('Location:../View/profil.php');
