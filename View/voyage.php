<?php
require_once('../controller/connexion_bdd.php');
require_once('../controller/traitement.php');

// $idRecette = $_GET['id'];
$tabvoyage = infovoyage(1);
$tabville = infoville(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>...</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/voyage.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div class="titre">
            <h1 class="vitemonvol"><a href="index.php" id="retour">V<span class="logo">ite</span>M<span class="logo">on</span>V<span class="logo">ol</span></a></h1>
        </div><br>
        <div class="paraphrase">
            <p class="petit">Le site référence en terme de circuit</p>
        </div>
        <nav>
            <ul>
                <li><a href="..." class="lien">Vol</a></li>
                <li><a href="liste circuit.php" class="lien">Circuit</a></li>
                <li><a href="..." class="lien">Connexion</a></li>
            </ul>
        </nav>
    </header>
    <div class="row g-0 bg-light position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    for
                    <div class="carousel-item active">
                        <img src="../Public/Image/carouseljapon<?=$I?>.jpg" class="d-block w-100" alt="...">
                    </div>
                    endfor
                </div>
            </div>
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <h5 class="mt-0">Columns with stretched link</h5>
            <p>Another instance of placeholder content for this other custom component. It is intended to mimic what some real-world content would look like, and we're using it here to give the component a bit of body and size.</p>
            <a href="#" class="stretched-link">Go somewhere</a>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center"><?= $tabvoyage['nom'] ?></h1>
        <!-- <div class="photoRecette">
            <img class="img-fluid" src="..\public\images\<?= file_exists("..\public\images\\" . $tabInfo['nom'] . ".jpg") ?  $tabInfo['nom'] : "Pas_image"  ?>.jpg" class="card-img-top" alt="<?= $tabInfo['nom'] ?>">
        </div> -->
        <div class="row">
            <div class="col-6">
                <?php for ($J = 1; $J < count($tabvoyage); $J++) : ?>
                    <?php $id_ville_arrivee = $tabvoyage['jour' . $J]['idvillearrivee'] ?>
                    jour <?= $tabvoyage['jour'.$J]['idjour'] ?> : <?= $tabvoyage['jour'.$J]['villedepart'] ?> > <?= $tabville['villearrivee'.$id_ville_arrivee] ?> <br>
                    de <?= $tabvoyage['jour'.$J]['depart'] ?> a <?= $tabvoyage['jour'.$J]['arrivee'] ?><br>
                    <?= $tabvoyage['jour'.$J]['planing'] ?><br>
                    hotel : <?= $tabville['hotel' . $id_ville_arrivee] ?> <br>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</body>
</html>