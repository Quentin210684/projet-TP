<?php require 'assets/template/header.php'; ?>





<div class="container-fluid">
    <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 colorLogo2">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 mt-5 text-white min-vh-100">

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="dashboard.php" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Jeux</span></a>
                        <ul class="collapse nav flex-column ms-1 submenu" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="gameListadmin.php" class="nav-link "> <span class="d-none d-sm-inline">Liste des jeux</span></a>
                            </li>
                            <li>
                                <a href="addListgameadmin.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un jeu</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Mods</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link "> <span class="d-none d-sm-inline">Liste des Mods</span></a>
                            </li>
                            <li>
                                <a href="addListmodadmin.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un Mod</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Utilisateurs</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="userAdmin.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter/supprimer un utilisateur</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Articles</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="adminArticl.php" class="nav-link "> <span class="d-none d-sm-inline">Liste des Articles</span></a>
                            </li>
                            <li>
                                <a href="addListarticladmin.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un Article</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu5" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Mon Dashboard</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu5" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="myDashboarduser.php" class="nav-link "> <span class="d-none d-sm-inline">Mon espace</span></a>
                            </li>
                            <li>
                                <a href="addModuser.php" class="nav-link "> <span class="d-none d-sm-inline">Mes Mods</span></a>
                            </li>
                            <li>
                                <a href="addOpinionuser.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un avis</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col py-3 text-start">
            <h2 id="neon" class="text-start mt-3 mb-5">Evaluation</h2>
            <div class="container">
                <div class="row mx-auto justify-content-center">
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-12 shadow text-white">

                                <form action="addOpinionuser.php" method="POST">

                                    <div class="col-sm-12 mt-3 mb-4">
                                        <h3>Evaluation</h3>
                                        <h5>Titre du jeux</h5>
                                    </div>
                                    <div class="row mx-auto text-center">
                                        <div class="col-sm-6 mb-3">
                                            <p>Vous avez jouer <span>"nombre d'heure"</span></p>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <p>Recommanderiez vous ce jeu ?</i></p>
                                        </div>
                                        <div class="col-sm-12 mb-2 ms-2">
                                            <div class="rating">

                                                <a href="#5" title="Give 5 stars">☆</a>

                                                <a href="#4" title="Give 4 stars">☆</a>

                                                <a href="#3" title="Give 3 stars">☆</a>

                                                <a href="#2" title="Give 2 stars">☆</a>

                                                <a href="#1" title="Give 1 star">☆</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-4 mx-auto ">
                                        <p>Veuillez décrire ce que vous avez aimé ou n'avez pas aimé à propos de ce jeu.
                                            Veuillez également indiquer si vous le recommandez à d'autres utilisateurs.
                                            Veillez à garder un langage correct et à respecter les règles du site. Votre recommandation ne sera pas publiées s'il
                                            n'y a pas de description.</p>
                                        </p>
                                    </div>
                                    <div class="col-sm-12 mb-4 mt-3">
                                        <label for="floatingTextarea2">Votre message</label>
                                        <textarea class="form-control" placeholder="Laissez un message..." name="message" id="floatingTextarea2" style="height: 100px"></textarea>
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto mb-3">
                                        <button class="btn btn-outline-dark text-white border border-white" type="button">Confirmer</button>
                                    </div>
                                    <div class="d-grid gap-2 col-12 justify-content-end mb-4">
                                        <button type="button" class="btn-close btn-outline-white text-white border-white" aria-label="Close"></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













<?php require 'assets/template/footer.php'; ?>