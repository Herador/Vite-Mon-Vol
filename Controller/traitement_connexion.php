<?php

require_once('../controller/connexion_bdd.php');
session_start();


if (isset($_POST['email']) && isset($_POST['password'])) {

   $email = htmlspecialchars($_POST['email']);
   $password = htmlspecialchars($_POST['password']);

   if ($email !== "" && $password !== "") {
      $requete = "SELECT count(*) FROM utilisateur 
                  where mail = '" . $email . "' and mdp = '" . $password . "' ";
      $exec_requete = mysqli_query($connexion, $requete);
      $reponse      = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      if ($count != 0) {

         $requete2 = "SELECT `id` , `nom`, `prenom`, `mail`, `mdp`, `is_admin` 
                      FROM utilisateur 
                      WHERE mail = '" . $email . "' ";
         $exec_requete2 = mysqli_query($connexion, $requete2);
         $reponse2      = mysqli_fetch_array($exec_requete2);
         $id = $reponse2['id'];
         $nom = $reponse2['nom'];
         $prenom = $reponse2['prenom'];
         $mail = $reponse2['mail'];
         $mdp = $reponse2['mdp'];
         $is_admin = $reponse2['is_admin'];

         $_SESSION['id'] = $id;
         $_SESSION['nom'] = $nom;
         $_SESSION['prenom'] = $prenom;
         $_SESSION['mail'] = $mail;
         $_SESSION['mdp'] = $mdp;
         $_SESSION['is_admin'] = $is_admin;
         header('Location: ../View/index.php?success=true');
         die();
      } else {
         header('Location: ../View/connexion.php?erreur=1');
         die();
      }
   } else {
      header('Location: ../View/connexion.php?erreur=2');
      die();
   }
} else {
   header('Location: ../View/connexion.php');
   die();
}
