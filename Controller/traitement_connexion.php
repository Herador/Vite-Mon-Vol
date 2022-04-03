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

         $requete2 = "SELECT `id` , `is_admin`,  
                  FROM utilisateur 
                  WHERE mail = '" . $email . "' ";
         $exec_requete2 = mysqli_query($connexion, $requete2);
         $reponse2      = mysqli_fetch_array($exec_requete2);
         $admin = $reponse['is_admin'];
         $id = $reponse['id'];

         $_SESSION['id'] = $id;
         $_SESSION['admin'] = $admin;
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
