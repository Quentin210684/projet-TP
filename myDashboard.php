<?php
session_start();
require_once 'admin/models/database.php'; ?>
<?php require_once 'admin/models/usersModel.php'; ?>
<?php require_once 'controllers/myDashboardController.php'; ?>
<?php require 'assets/template/header.php'; ?>





<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Mon espace personnel</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <i class="fas fa-angle-double-right fs-4"></i>
                </a></h2>


            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header colorLogo2">
                    <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Dashboard Administrateur</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-white">
                    <div>
                        <a class="dropdown-item text-decoration-none" href="espace-utilisateur">Mon espace</a>
                        <a class="dropdown-item text-decoration-none" href="utilisateur-ajouter-un-mod">Mes Mods</a>
                        <a class="dropdown-item text-decoration-none" href="ajouter-un-avis">Ajouter un avis</a>
                    </div>
                </div>
            </div>

            <div class="col py-3 text-start">
                <div class="col-sm-12">
                    <div class="text-center text-white mt-4 fs-5">
                        <h4>Bonjour, <?= $_SESSION['user']->name ?> bienvenue dans votre espace personnel.</h4>
                        <p>Vous pouvez si vous le souhaitez modifier votre profil.</p>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <div class="container-fluid">
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Votre nom</th>
                                                    <th scope="col">Votre email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center text-white">
                                                    <th class="align-middle" scope="row"><?= $_SESSION['user']->id ?></th>
                                                    <td class="align-middle"><?= $user->name ?></td>
                                                    <td class="align-middle"><?= $user->email ?></td>
                                                    <td class="align-middle">
                                                        <a href="utilisateur-modification" class="btn btn-warning" title="Modifier votre profil"><i class="fas fa-user-edit"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php require 'assets/template/footer.php'; ?>