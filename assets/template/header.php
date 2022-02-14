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
    <script src="https://www.google.com/recaptcha/api.js"></script>
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
                <div class="text-end" id="rechercher">
                <?php if (!$_SESSION) { ?>
                <a href="premiere-visite" class="me-4 text-white text-decoration-none"><i class="fas fa-gamepad image-clignote"></i>&nbsp;PREMIERE VISITE ?</a>
                <?php } ?>
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-search"></i></button>
                </div>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header colorLogo2 text-white">
                        <h5 id="offcanvasRightLabel">Que recherchez-vous ?</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form action="" method="get">
                            <input class="form-control me-2 mb-2" type="search" placeholder="Chercher un jeu..." aria-label="Search">
                            <button class="btn btn-outline-dark text-white border border-white" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-3 mt-5 pt-1" id="contact">
                <a href="contact.php" class="text-decoration-none text-white">Contact</a>
            </div>
        </div>
    </header>

    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <!--NAVBAR-->

    <section class=" p-0 shadow sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="nav-link figure-img" aria-current="page" href="accueil"><img src="assets/img/logo home1.png" class="img-fluid" alt="Home"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white figure-img text-decoration-none" aria-current="page" href="jeux">Jeux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white figure-img text-decoration-none" href="mods">Mods</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white figure-img text-decoration-none" href="article-de-presse">Articles</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white figure-img text-decoration-none" href="test" id="test">Game test</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white figure-img text-decoration-none" href="rediger-un-avis">Rédiger un avis</a>
                        </li>
                        <?php if ($_SESSION) { ?>
                            <!-- Il s'agit d'une variable « superglobale », ou globale automatique. 
                            Cela signifie simplement qu'il est disponible dans toutes les étendues d'un script. 
                            Il n'est pas nécessaire de faire une $variable globale ; pour y accéder dans les fonctions ou les méthodes. -->
                            <li class="nav-item">
                                <a class="nav-link text-white figure-img text-decoration-none" href="espace-utilisateur">Profil</a>
                            </li>
                            <?php if ($_SESSION['user']->id_roles == 1) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white figure-img text-decoration-none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Admin
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="administration">Dashboard</a></li>
                                        <li><a class="dropdown-item" href="admin-ajouter-un-article">Ajouter un article</a></li>
                                        <li><a class="dropdown-item" href="admin-ajouter-un-jeu">Ajouter un jeu</a></li>
                                        <li><a class="dropdown-item" href="admin-ajouter-un-mod">Ajouter un mod</a></li>
                                        <li><a class="dropdown-item" href="liste-admin-articles">Liste des articles</a></li>
                                        <li><a class="dropdown-item" href="admin-liste-des-jeux">Liste des jeux</a></li>
                                        <li><a class="dropdown-item" href="admin-liste-des-mods">Liste des mods</a></li>
                                        <li><a class="dropdown-item" href="admin-liste-des-utilisateurs">Liste des utilisateurs</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if (!$_SESSION) { ?>
                            <li class="nav-item">
                                <a class="nav-link text-white figure-img text-decoration-none" href="connexion">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white figure-img text-decoration-none" href="inscription">Inscription</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link text-white figure-img text-decoration-none">Bonjour, <?= $_SESSION['user']->name ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white figure-img text-decoration-none" href="deconnexion" data-bs-toggle="modal" data-bs-target="#exampleModal1">Se déconnecter</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="navbar-nav d-md-none">
                        <li class="nav-item">
                            <a class="nav-link text-white figure-img text-decoration-none" href="contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Déconnexion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
                </div>
                <div class="modal-footer colorLogo2">
                    <button type="button" class="btn btn-outline-dark text-white border border-white" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-outline-dark text-white border border-white"><a href="deconnexion" class="text-decoration-none text-white">Se déconnecter</a></button>
                </div>
            </div>
        </div>
    </div>