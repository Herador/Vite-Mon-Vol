<?php
require_once('../controller/connexion_bdd.php');


if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['prenom'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $prenom = htmlspecialchars($_POST['prenom']);
    print_r($email);
    die();

    $check = ("SELECT `nom`, `email`, `password` FROM utilisateur WHERE email = ?");
    $check = $connexion->prepare($check);
    $check->bind_param("e", $email);
    $check->execute();
    $data = $check->fetch();
    $row = $check->rowCount();

    $email = strtolower($email);


    if ($row == 0) {
        if (strlen($nom) <= 100) {
            if (strlen($email) <= 100) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


                    $insert = ('INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES(?, ?, ?, ?)');
                    $insert = $connexion->prepare($insert);
                    $insert->bind_param("ssss", $nom, $email, $password, $prenom);
                    $insert->execute();


                    header('Location:inscription.php?reg_err=success');
                    die();
                } else {
                    header('Location: inscription.php?reg_err=password');
                    die();
                }
            } else {
                header('Location: inscription.php?reg_err=email');
                die();
            }
        } else {
            header('Location: inscription.php?reg_err=email_length');
            die();
        }
    } else {
        header('Location: inscription.php?reg_err=already');
        die();
    }
}
