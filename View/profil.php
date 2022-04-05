<?php
session_start();
require_once('../controller/connexion_bdd.php');
require_once('../controller/traitement.php');

$id = $_SESSION['id'];
$tabcircuit = circuit($id);
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
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h4 class="card-title text-center"><strong> Mon profil</strong></h4>

                        <h5 class="card-text">Mon nom :</h5>

                        <?php
                        if (isset($_GET['key'])) :
                            if ($_GET['key'] == 1) : ?>
                                <form action="../Controller/traitement_modif.php?id=<?= $id ?>&col=nom" method="POST">
                                    <input type="text" value="<?= $_SESSION['nom'] ?>" name="modif">
                                    <input class="btn btn-success" type="submit" value="valider">
                                </form>
                            <?php endif;
                        else : ?>
                            <p class="card-text"><?= $_SESSION['nom'] ?>
                            <div class="modif"><a class="btn btn-warning" href="profil.php?key=1" role="button">changer</a></div>
                            </p>
                        <?php endif ?>

                        <h5 class="card-text">Mon prenom :</h5>

                        <?php if (isset($_GET['key'])) :
                                if ($_GET['key'] == 2) : ?>
                                    <form action="../Controller/traitement_modif.php?id=<?= $id ?>&col=prenom" method="POST">
                                        <input type="text" value="<?= $_SESSION['prenom'] ?>" name="modif">
                                        <input class="btn btn-success" type="submit" value="valider">
                                    </form>
                            <?php endif;
                        else : ?>
                            <p class="card-text"><?= $_SESSION['prenom'] ?>
                            <div class="modif"><a class="btn btn-warning" href="profil.php?key=2" role="button">changer</a></div>
                            </p>
                        <?php endif ?>

                        <h5 class="card-text">Mon mail :</h5>

                        <?php if (isset($_GET['key'])) :
                                if ($_GET['key'] == 3) : ?>
                                    <form action="../Controller/traitement_modif.php?id=<?= $id ?>&col=mail" method="POST">
                                        <input type="text" value="<?= $_SESSION['mail'] ?>" name="modif">
                                        <input class="btn btn-success" type="submit" value="valider">
                                    </form>
                            <?php endif;
                        else : ?>
                            <p class="card-text"><?= $_SESSION['mail'] ?>
                            <div class="modif"><a class="btn btn-warning" href="profil.php?key=3" role="button">changer</a></div>
                            </p>
                        <?php endif ?>

                        <h5 class="card-text">Mon mot de passe :</h5>

                        <?php if (isset($_GET['key'])) :
                                if ($_GET['key'] == 4) : ?>
                                    <form action="../Controller/traitement_modif.php?id=<?= $id ?>&col=mdp" method="POST">
                                        <input type="text" value="<?= $_SESSION['mdp'] ?>" name="modif">
                                        <input class="btn btn-success" type="submit" value="valider">
                                    </form>
                            <?php endif;
                        else : ?>
                            <p class="card-text"><?= $_SESSION['mdp'] ?>
                            <div class="modif"><a class="btn btn-warning" href="profil.php?key=4" role="button">changer</a></div>
                            </p>
                        <?php endif ?>
                        
                        <a class="btn btn-danger" href="index.php?deconnexion=true" role="button">Deconnexion</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card" style="width: 45rem;">
                    <div class="card-body">
                        <h4 class="card-title"><strong>Mes voyage</strong></h4>

                        <?php if ($tabcircuit['count'] == 0) : ?>
                            Aucun voyage ! Vivez une incoyable aventure en <a href="liste circuit.php">cliquant ici</a>
                        <?php else : ?>
                            <div class="table" style="height: 100%;">
                                <table>
                                    <thead>
                                        <tr>
                                            <th scope="col">nom du voyage</th>
                                            <th scope="col">date de reservation</th>
                                            <th scope="col">date de debut</th>
                                            <th scope="col">date de fin</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td><?= $tabcircuit["nom"] ?></td>
                                            <td><?= $tabcircuit["date_reservation"] ?></td>
                                            <td><?= $tabcircuit["date_debut"] ?></td>
                                            <td><?= $tabcircuit["date_fin"] ?></td>
                                        </tr>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>