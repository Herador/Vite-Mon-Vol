<?php
require_once('connexion_bdd.php');
session_start();


if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['prenom'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $prenom = htmlspecialchars($_POST['prenom']);

    $requete = "SELECT count(*) FROM utilisateur WHERE mail = '" . $email . "'";
    $exec_requete = mysqli_query($connexion, $requete);
    $reponse      = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];

    $email = strtolower($email);

    if ($count == '0') {
        if (strlen($nom) <= 100) {
            if (strlen($email) <= 100) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $insert = ('INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES(?, ?, ?, ?)');
                    $insert = $connexion->prepare($insert);
                    $insert->bind_param("ssss", $nom, $prenom, $email, $password);
                    $insert->execute();

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
                    header('Location: ../View/inscription.php?reg_err=password');
                    die();
                }
            } else {
                header('Location: ../View/inscription.php?reg_err=email');
                die();
            }
        } else {
            header('Location: ../View/inscription.php?reg_err=email_length');
            die();
        }
    } else {
        header('Location: ../View/inscription.php?reg_err=already');
        die();
    }
} else {
    header('Location: ../View/inscription.php?reg_err=void');
    die();
}
