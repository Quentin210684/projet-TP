<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Game screening</title>
</head>

<body>

    <!--En tête-->

    <header class="container-fluid">
        <div class="row">
            <div class="col-md-4 col">
                <img src="assets/img/gif/Game Screening (2).gif" alt="logo" id="logo">
            </div>

            <!--Logo/recherche/contact-->

            <div class="col-md-7 col-5 mt-5">
                <div class="search text-end">
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-search"></i></button>
                </div>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Que recherchez-vous ?</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form action="" method="get">
                            <input class="form-control me-2 mb-2" type="search" placeholder="Chercher un jeu..." aria-label="Search">
                            <button class="btn btn-outline-light border border-dark text-start text-dark" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-3 mt-5 pt-1">
                <a href="contact.php" class="text-decoration-none text-white">Contact</a>
            </div>
        </div>
    </header>

    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--NAVBAR-->

    <section class=" p-0 shadow sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="nav-link" aria-current="page" href="index.php"><img src="assets/img/logo home1.png" class="img-fluid" alt="Home"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="games.php">Jeux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="mods.php">Mods</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="pressArticle.php">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="gametest.php" id="test">Game test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="review.php">Rédiger un avis</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="connection.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="registration.php">Inscription</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>