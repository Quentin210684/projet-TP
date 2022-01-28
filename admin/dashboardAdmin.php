<?php require '../assets/template/header.php'; ?>




<div class="container-fluid">
    <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 colorLogo2">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 mt-5 text-white min-vh-100">

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="administration" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Jeux</span></a>
                        <ul class="collapse nav flex-column ms-1 submenu" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="admin-liste-des-jeux" class="nav-link "> <span class="d-none d-sm-inline">Liste des jeux</span></a>
                            </li>
                            <li>
                                <a href="admin-ajouter-un-jeu" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un jeu</span></a>
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
                                <a href="admin-ajouter-un-mod" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un Mod</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Utilisateurs</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="admin-liste-des-utilisateurs" class="nav-link "> <span class="d-none d-sm-inline">Ajouter/supprimer un utilisateur</span></a>
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
                                <a href="admin-ajouter-un-article" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un Article</span></a>
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
            <h2 id="neon" class="text-start mt-3 mb-5">Dashboard</h2>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card mb-3" id="cardtest">
                        <div class="fontColor card-body text-center">
                            <i class="fas fa-users" id="user"></i>
                            <h5 class="card-title">Utilisateurs enregistrés</h5>
                            <p class="card-text" id="user">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mb-3">
                        <div class=" fontColor2 card-body text-center">
                            <i class="far fa-eye" id="opinion"></i>
                            <h5 class="card-title">visiteurs quotidiens</h5>
                            <p class="card-text" id="user">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mb-3">
                        <div class="fontColor3 card-body text-center">
                            <i class="far fa-comments text-white" id="opinion"></i>
                            <h5 class="card-title text-white">Total Avis</h5>
                            <p class="card-text text-white" id="user">0</p>
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