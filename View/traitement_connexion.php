<?php

require_once('../controller/connexion_bdd.php');
session_start();


if (isset($_POST['email']) && isset($_POST['password'])) {

   $email = htmlspecialchars($_POST['email']);
   $password = htmlspecialchars($_POST['password']);

   if ($email !== "" && $password !== "") {
      $requete = "SELECT count(*) FROM utilisateur where 
                  mail = '" . $email . "' and mdp = '" . $password . "' ";
      $exec_requete = mysqli_query($connexion, $requete);
      $reponse      = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];
   }
   if ($count != 0) {

      $check = "SELECT `nom`, `prenom`, `is_admin` 
      FROM utilisateur 
      WHERE mail = '" . $email . "' and mdp = '" . $password . "' ";
      $check = $connexion->prepare($check);
      $check->bind_param("s", $email);
      $check->execute();

      if ($data['is_admin'] == 1) {
         $_SESSION['admin'] = $exec_requete['nom'] + $exec_requete['prenom'];
         header('Location: index.php');
         die();
         $_SESSION['username'] = $exec_requete['nom'] + $exec_requete['prenom'];
         header('Location: index.php');
         die();
      } else {
         header('Location: connexion.php?erreur=1');
         die();
      }
   } else {
      header('Location: connexion.php?erreur=2');
      die();
   }
} else {
   header('Location: connexion.php');
   die();
}
