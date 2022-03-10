<?php
session_start();
require_once 'models/database.php'; ?>
<?php require_once 'models/usersModel.php'; ?>
<?php require_once 'models/gamesModel.php'; ?>
<?php require_once 'models/commentModel.php'; ?>
<?php require_once 'controllers/dashboardAdminController.php'; ?>
<?php require '../assets/template/header.php'; ?>





<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2"> Dashboard</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <i class="fas fa-angle-double-right fs-4"></i>
                </a></h2>


            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header colorLogo2">
                    <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Dashboard Administrateur</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-white">
                    <div>
                        <a class="dropdown-item text-decoration-none" href="administration">Dashboard</a>
                        <a class="dropdown-item text-decoration-none" href="admin-ajouter-un-article">Ajouter un article</a>
                        <a class="dropdown-item text-decoration-none" href="admin-ajouter-un-jeu">Ajouter un jeu</a>
                        <a class="dropdown-item text-decoration-none" href="admin-ajouter-un-mod">Ajouter un mod</a>
                        <a class="dropdown-item text-decoration-none" href="liste-admin-articles">Liste des articles</a>
                        <a class="dropdown-item text-decoration-none" href="admin-liste-des-jeux">Liste des jeux</a></li>
                        <a class="dropdown-item text-decoration-none" href="admin-liste-des-mods">Liste des mods</a></li>
                        <a class="dropdown-item text-decoration-none" href="admin-liste-des-utilisateurs">Liste des utilisateurs</a>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-3">
                    <div class="card mb-3" id="cardtest">
                        <div class="fontColor card-body text-center">
                            <i class="fas fa-users" id="user"></i>
                            <h5 class="card-title">Utilisateurs enregistrés</h5>
                            <p class="card-text" id="user">
                                <?php
                                foreach ($user as $users) {
                                    echo $users->usersCounter;
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <div class=" fontColor2 card-body text-center">
                            <i class="far fa-eye" id="opinion"></i>
                            <h5 class="card-title">Total commentaires</h5>
                            <p class="card-text" id="user">
                            <?php
                                foreach ($comment as $comments) {
                                    echo $comments->articlesCounter;
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <div class="fontColor4 card-body text-center">
                            <i class="far fa-comments text-white" id="opinion"></i>
                            <h5 class="card-title text-white">Total Avis</h5>
                            <p class="card-text text-white" id="user">
                                <?php
                                foreach ($user as $users) {
                                    echo $users->evaluationsCounter;
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card mb-3">
                        <div class="fontColor3 card-body text-center">
                            <i class="fas fa-gamepad text-white" id="opinion"></i>
                            <h5 class="card-title text-white">Total Jeux</h5>
                            <p class="card-text text-white" id="user">
                                <?php
                                foreach ($game as $games) {
                                    echo $games->gamesCounter;
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-4">
                <div class="row gx-5 mt-5">
                    <div class="col-sm-6">
                        <div class="p-3 border border-dark rounded fontColor shadow">
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 border border-dark rounded fontColor shadow">
                            <canvas id="myChart2" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













<?php require '../assets/template/footer.php'; ?>