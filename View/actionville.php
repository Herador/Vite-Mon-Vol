<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout circuit</title>
</head>
<body>
<h1>Bienvenue dans le programme d'ajout de voyage</h1>
    <h1>rajouter le circuit</h1>
    <form class="row g-3" action="../view/actioncircuit.php" method="POST">
        <div class="col-md-4">
           <label for="nom" class="form-label">Nom du voyage</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="col-md-4">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="col-md-4">
           <label for="nombreplace" class="form-label">Nombre de place</label>
            <input type="number" class="form-control" id="nombreplace" name="nombreplace" required>
        </div>
        <div class="col-md-4">
            <label for="dated" class="form-label">date de début</label>
            <input type="date" class="form-control" id="dated" name="dated" required>
        </div>
        <div class="col-md-4">
           <label for="datef" class="form-label">date de fin</label>
            <input type="date" class="form-control" id="datef" name="datef" required>
        </div>
        <div class="col-md-4">
            <label for="prix" class="form-label">prix</label>
            <input type="number" class="form-control" id="prix" name="prix" required>
        </div>
        <div class="col-12">
                <button type="submit" class="btn btn-light">Ajouter</button> </div>
    </form>
    
</body>
</html>