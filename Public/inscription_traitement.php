<?php 
    require_once 'config.php'; 

    
    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['prenom']))
    {
        
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $prenom = htmlspecialchars($_POST['prenom']);

        
        $check = $bdd->prepare('SELECT nom, email, password FROM utilisateur WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); 
        
         
        if($row == 0){ 
            if(strlen($nom) <= 100){ 
                if(strlen($email) <= 100){ 
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                                                  
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                        
                             
                            $insert = $bdd->prepare('INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES(:nom, :prenom, :mail, :password)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'mail' => $email,
                                'mdp' => $password,
                                'prenom' => $prenom,
                            ));
                            
                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }