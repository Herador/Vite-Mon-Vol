<?php require_once("../controller/connexion_bdd.php"); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout ville</title>
</head>
<body>

    <h2>Ajouter une ville</h2>
    
    <form class="row g-3" action="../view/admin.php" method="POST">
        <div class="col-md-4">
           <label for="nom" class="form-label">Nom de la ville</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="col-md-4">
            <label for="hotel" class="form-label">Nom de l'hôtel</label>
            <input type="text" class="form-control" id="hotel" name="hotel" required>
        </div>
        <div class="col-12">
                <button type="submit" class="btn btn-light">Ajouter</button> </div>
    </form>
    
</body>
</html>