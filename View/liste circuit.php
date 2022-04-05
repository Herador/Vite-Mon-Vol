<?php
require_once("../controller/connexion_bdd.php");
session_start();


$request = "SELECT `id`, `description`, `nom` FROM circuit";
$showcard = $connexion->query($request);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des circuit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="C:\wamp64\www\Vite-Mon-Vol\Controller\card.css" rel="stylesheet">
  <link rel="stylesheet" href="../Public/CSS/liste circuit.css">
</head>

<body>
<header class="bg-primary border-bottom border-2 border-dark">
        <div class="titre">
            <h1 class="vitemonvol"><a href="index.php" id="retour">V<span class="logo">ite</span>M<span class="logo">on</span>V<span class="logo">ol</span></a></h1>
        </div><br>
        <div class="paraphrase">
            <p class="petit">Le site référence en terme de circuit</p>
        </div>
        <nav>
            <ul class="navigation">
                <li class="onglet"><a href="..." class="lien">Vol</a></li>
                <li class="onglet"><a href="liste circuit.php" class="lien">Circuit</a></li>

                <?php if (isset($_SESSION['id'])) : ?>

                    <?php if ($_SESSION['is_admin'] == 1) : ?>
                        <li class="onglet"><a href="admin.php" class="lien">Gestion du site</a></li>
                    <?php elseif ($_SESSION !== "") : ?>
                        <li class="onglet"><a href="profil.php" class="lien">Mon compte</a></li>
                    <?php endif ?>
                <?php else : ?>
                    <li class="onglet"><a href="connexion.php" class="lien">Connexion</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </header>

  <div class="card-group">
    <?php while ($row = $showcard->fetch_array(MYSQLI_ASSOC)) : ?>

      <div class="card">
        <img class="card-img-top" src="..\Public\Image\index<?= $row['id'] ?>.jpg">
        <div class="card-body">
          <h5 class="card-title"><?= $row['nom']; ?></h5>
          <p class="card-text"><?= $row['description']; ?></p>
          <a class="btn btn-primary" href="voyage.php?id=<?= $row['id']; ?>" role="button">En savoir plus</a>
        </div>
        </a>
      </div>


    <?php endwhile; ?>
  </div>

</body>

</html>