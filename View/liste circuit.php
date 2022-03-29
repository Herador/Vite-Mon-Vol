<?php
require_once ("connexion_bdd.php");

$tokyo= sprintf("SELECT `description` FROM circuit WHERE id=1");
$test = $connexion -> query ($tokyo) ;

 while ($row = $test->fetch_array(MYSQLI_ASSOC)) {
   $description = $row['description'];
 }


 $canada= sprintf("SELECT `description` FROM circuit WHERE id=3");
$test2 = $connexion -> query ($canada) ;

 while ($row = $test2->fetch_array(MYSQLI_ASSOC)) {
   $description2 = $row['description'];
 }


 $grece= sprintf("SELECT `description` FROM circuit WHERE id=2");
$test3 = $connexion -> query ($grece) ;

 while ($row = $test3->fetch_array(MYSQLI_ASSOC)) {
   $description3 = $row['description'];
 }

//------------------------------------------------------------------------------------------- //

 $tokyonom= sprintf("SELECT `nom` FROM circuit WHERE id=1");
$test = $connexion -> query ($tokyonom) ;

 while ($row = $test->fetch_array(MYSQLI_ASSOC)) {
   $nom = $row['nom'];
 }


 $canadanom= sprintf("SELECT `nom` FROM circuit WHERE id=3");
$test2 = $connexion -> query ($canadanom) ;

 while ($row = $test2->fetch_array(MYSQLI_ASSOC)) {
   $nom2 = $row['nom'];
 }


 $grecenom= sprintf("SELECT `nom` FROM circuit WHERE id=2");
$test3 = $connexion -> query ($grecenom) ;

 while ($row = $test3->fetch_array(MYSQLI_ASSOC)) {
   $nom3 = $row['nom'];
 }


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="C:\wamp64\www\Vite-Mon-Vol\Controller\card.css" rel="stylesheet">
</head>
<body>


<div class="card-group">
  <div class="card">
    <img src="..\Public\Image\777.jpg" class="card-img-top" alt="...">
    <div class="card-body">
    <h1 class="card-title"> <?php echo ($nom) ?></h1>
      <h5 class="card-title"> <?php echo ($description) ?></h5>
      <a class="btn btn-primary" href="..\Vite-Mon-Vol\View\tokyocard.php" role="button">En savoir plus</a>
      
    </div>
  </div>
  <div class="card">
    <img src="..\Public\Image\23625.jpg" class="card-img-top" alt="...">
    <div class="card-body">
    <h1 class="card-title"> <?php echo ($nom2) ?></h1>
      <h5 class="card-title"><?php echo ($description2) ?></h5>
      <a class="btn btn-primary" href="..\Vite-Mon-Vol\View\canadacard.php" role="button">En savoir plus</a>
      
    </div>
  </div>
  <div class="card">
    <img src="..\Public\Image\42004.jpg" class="card-img-top" alt="...">
    <div class="card-body">
    <h1 class="card-title"> <?php echo ($nom3) ?></h1>
      <h5 class="card-title"><?php echo ($description3) ?></h5>
      <a class="btn btn-primary" href="..\Vite-Mon-Vol\View\grececard.php" role="button">En savoir plus</a>
      
    </div>
  </div>
</div>
</body>
</html>