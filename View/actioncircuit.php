<?php 
// require_once ('C:\wamp64\www\Vite-Mon-Vol\admin\adminvoyage.php');
require_once ('C:\wamp64\www\Vite-Mon-Vol\Controller\ajoutcircuit.class.php');

$menu = "SELECT `id`, `nom` FROM `ville`";
$villes = $connexion -> query($menu);
$villess = $connexion -> query($menu);


if (isset($_POST['nom'])) {  
    $requete1 = new ajoutcircuit (htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['description']),htmlspecialchars($_POST['nombreplace']), htmlspecialchars($_POST['dated']),htmlspecialchars($_POST['datef']), htmlspecialchars($_POST['prix']));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout deplacement</title>
</head>
<body>

<h1>Maintenant on rajoute le déplacement</h1>
    <form class="row g-3" action="../view/actiondeplacement.php" method="POST">
        <div class="col-md-4">
            <label for="planning_jour" class="form-label">planning</label>
            <input type="text" class="form-control" id="planning_jour" name="planning_jour" required>
        </div>
        <div class="col-md-4">
           <label for="heure_depart" class="form-label">heure de départ</label>
            <input type="time" class="form-control" id="heure_depart" name="heure_depart" required>
        </div>
        <div class="col-md-4">
            <label for="heure_arrivee" class="form-label">heure d'arriver</label>
            <input type="time" class="form-control" id="heure_arrivee" name="heure_arrivee" required>
        </div>
        <div class="col-md-4">
           <select name="ville_depart" class="form-label">
               <option value=""> ville de départ </option>
               <?php while($ville=$villes->fetch_array(MYSQLI_ASSOC)):?>
                <option value="<?=$ville['id']?>"><?=$ville['nom'] ?></option>
                <?php endwhile ?>
           </select>
            
        </div>
        <div class="col-md-4">
        <select name="ville_arrivee" class="form-label">
               <option value=""> ville d'arrivee </option>
               <?php while($test=$villess->fetch_array(MYSQLI_ASSOC)):?>
                <option value="<?=$test['id']?>"><?=$test['nom'] ?></option>
                <?php endwhile ?>
           </select>
            
        </div>
        <div class="col-12">
                <button type="submit" class="btn btn-light">Ajouter</button> </div>
    </form>
</body>
</html>

