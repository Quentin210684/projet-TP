<?php require 'models/usersModel.php'; ?>
<?php require 'controller/userAdminControllers.php'; ?>
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
            <h2 id="neon" class="text-start mt-3 mb-5">Utilisateurs</h2>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table text-white text-center">
                                <thead>
                                    <tr>
                                        <th scope="col-sm-2">#</th>
                                        <th scope="col-sm-2">UTILISATEUR</th>
                                        <th scope="col-sm-2">EMAIL</th>
                                        <th scope="col-sm-2">ROLE</th>
                                        <th scope="col-sm-4">MODIFIER</th>
                                        <th scope="col-sm-4">SUPPRIMER</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usersList as $userDetails) { ?>
                                        <tr>
                                            <th scope="row"><?= $userDetails->id ?></th>
                                            <td><?= $userDetails->name ?></td>
                                            <td><?= $userDetails->email ?></td>
                                            <td><?php $userDetails->id_roles ?></td>
                                            <td> <button class="btn btn-warning" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier un utilisateur"><i class="far fa-eye"></i></button>
                                            </td>
                                            <td>
                                                <form action="userAdmin.php" method="POST"><input type="hidden" name="deleteUser" value="<?= $userDetails->id ?>"><button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer un utilisateur"><i class="far fa-times-circle"></i></button></form>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div>
            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
        </div>
    </div>
    <div class="col-sm-2 border">
        UTILISATEUR
    </div>
    <div class="col-sm-2 border">
        EMAIL
    </div>
    <div class="col-sm-1 border">
        ACTIF
    </div>
    <div class="col-sm-1 border">
        ROLES
    </div>
    <div class="col-sm-2 border">
        MEMBRE DEPUIS
    </div>
    <div class="col-sm-3 border">
        ACTION
    </div>
</div>
<div class=" verticalAlign row text-center text-white">
    <div class="col-sm-1 border">
        <div>
            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
        </div>
    </div>
    <div class="col-sm-2 border">
        ...
    </div>
    <div class="col-sm-1 border">
        ..
    </div>
    <div class="col-sm-1 border">
        ..
    </div>
    <div class="col-sm-2 border">
        ..
    </div>
    <div class="col-sm-2 border">
        ...
    </div>
    <div class="col-sm-3 border">
        <p><a href="#" class=" text-decoration-none">Modifier</a>/<a href="#" class=" text-decoration-none">Annuler le compte</a></p>
    </div> -->











<?php require 'assets/template/footer.php'; ?>