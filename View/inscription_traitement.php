<?php
require_once('../controller/connexion_bdd.php');


if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['prenom'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $prenom = htmlspecialchars($_POST['prenom']);

    $check = "SELECT `mail`, `mdp` FROM utilisateur WHERE mail = ?";
    $check = $connexion->prepare($check);
    $check->bind_param("s", $email);
    $check->execute();
    $data = $check->fetch();
    $row = $check->num_rows();

    $email = strtolower($email);
print_r($row);
die();

    if ($row == 0) {
        if (strlen($nom) <= 100) {
            if (strlen($email) <= 100) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


                    $insert = ('INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES(?, ?, ?, ?)');
                    $insert = $connexion->prepare($insert);
                    $insert->bind_param("ssss", $nom, $prenom, $email, $password);
                    $insert->execute();

                    $_SESSION['username'] = $nom + $prenom;
                    header('Location:index.php');
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
