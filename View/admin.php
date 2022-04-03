<?php require_once("../controller/connexion_bdd.php"); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="session.css" media="screen" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>TOUT LES UTILISATEURS</h1></div>
    <div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">prénom </th>
                <th scope="col">mail</th>
                <th scope="col">mdp</th>
                <th scope="col">date voyage</th>
            </tr>
        </thead>
        <tbody>
            <?php session_start(); 
            $requete = "SELECT utilisateur.id, utilisateur.nom, utilisateur.prenom, utilisateur.mail, utilisateur.mdp, utilisateur_circuit.date_reservation, utilisateur_circuit.id_utilisateur, utilisateur_circuit.id_circuit FROM utilisateur, utilisateur_circuit WHERE utilisateur.id = utilisateur_circuit.id_circuit";
            $result = $connexion->query($requete);
            
            foreach($result as $range) :?>
                <tr>
                    <th scope="row">user <?=$range["id"]?></th>
                    <td><?=$range["nom"]?></td>
                    <td><?=$range["prenom"]?></td>
                    <td><?=$range["mail"]?></td>
                    <td><?=$range["mdp"]?></td>
                    <td><?=$range["date_reservation"]?></td>
                    <td><?=$range["id_utilisateur"]?></td>
                    <td><?=$range["id_circuit"]?></td>
                    <td><a class="btn btn-warning" href="change.php?key=<?=$range["id"]?>"role="button">change</a></td>
                    <td><a class="btn btn-danger" href="deleteone.php?key=<?=$range["id"]?>" role="button">delete</a></td>
                </tr>
                <?php endforeach?>
        </tbody>
        <tfoot>
          <tr>
            <th scope="row" colspan="2">
                <form action="delete.php" method="$_POST">
                <input class="btn btn-danger" type="submit" value="delete all">
                </form>
            </th>
            <td colspan="2">
                <form action="index.php" method="$_POST">
                <input class="btn btn-success" type="submit" value="add one">
                </form></td>
          </tr>
        </tfoot>
    </table></div>
</body>
</html>    