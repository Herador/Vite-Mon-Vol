<?php 
require_once ('C:\wamp64\www\Vite-Mon-Vol\Controller\ajoutdeplacement.class.php');


$requete2 = new ajoutdeplacement (htmlspecialchars($_POST['planning_jour']),htmlspecialchars($_POST['heure_depart']), htmlspecialchars($_POST['heure_arrivee']),htmlspecialchars($_POST['ville_depart']), htmlspecialchars($_POST['ville_arrivee']));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Nouveau déplacement</title>
</head>
<body>
<a href="admin.php" role="button" class="btn btn-danger">fin du circuit</a>
<a href="actioncircuit.php" role="button" class="btn btn-success">ajout d'un déplacement</a>
</body>
</html>

