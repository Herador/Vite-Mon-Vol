<?php
require_once('../controller/connexion_bdd.php');
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
