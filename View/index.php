<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Public/CSS/index.css">
    <title>Accueil</title>
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
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image"><img src="../Public/Image/japoncorrige.jpg" class="d-block w-100" alt="..."></div>
                <div class="carousel-caption d-none d-md-block">
                    <h1>Japon</h1>
                    <h4>Un pays à l'accueil chaleureux et à la gastronomie exquise avec des paysages somptueux et une architecture enchanteresse. </h4>
                    <a href="voyage.php?id=<?=1?> " role="button">
                        <div class="container">
                            <button type="button" class="button">
                                <span>Voyager!</span>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="image"><img src="../Public/Image/greececorrige.jpg" class="d-block w-100" alt="..."></div>
                <div class="carousel-caption d-none d-md-block">
                    <h1>Grèce</h1>
                    <h4>La Grèce est sans aucun doute l’un des plus beaux pays du monde : ruines, histoire, superbes paysages, la mer, le ciel bleu, le soleil. </h4>
                    <a href="voyage.php?id=<?=2?> " role="button">
                        <div class="container">
                            <button type="button" class="button">
                                <span>Voyager!</span>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="image"><img src="../Public/Image/canadacorrige.jpg" class="d-block w-100" alt="..."></div>
                <div class="carousel-caption d-none d-md-block">
                    <h1>Canada</h1>
                    <h4>Grands espaces, nature omniprésente, faune exceptionnelle… Si vous voulez vous ressourcer dans les bras de Dame Nature, vous êtes au bon endroit.</h4>
                    <a href="voyage.php?id=<?=3?> " role="button">
                        <div class="container">
                            <button type="button" class="button">
                                <span>Voyager!</span>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</body>

</html>