<?php
session_start();
require_once('../controller/connexion_bdd.php');
require_once('../controller/traitement.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mon profil </title>
    <!-- CSS only -->
    <link rel="stylesheet" href="../public/css/profil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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


</body>

</html>