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
                    <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Dashboard Utilisateur</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-white">
                    <div>
                        <a class="dropdown-item text-decoration-none" href="espace-utilisateur">Mon espace</a>
                        <a class="dropdown-item text-decoration-none" href="utilisateur-ajouter-un-mod">Mes Mods</a>
                        <a class="dropdown-item text-decoration-none" href="mes-avis">Mes avis</a>
                        <a class="dropdown-item text-decoration-none" href="mes-commentaires">Mes commentaires</a>

                    </div>
                </div>
            </div>

            <div class="col py-3 text-start">
                <div class="col-sm-12">
                    <div class="text-center text-white mt-4 fs-5">
                        <h4>Bonjour, <?= $_SESSION['user']->name ?> bienvenue dans votre espace personnel.</h4>
                        <p>Vous pouvez si vous le souhaitez modifier ou supprimer votre profil.</p>
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
                                                    <td class="align-middle">
                                                        <button type="button" class="btn btn-danger" data-bs-whatever="" data-bs-toggle="modal" data-bs-target="#deleteItem" title="Supprimer un utilisateur"><i class="far fa-times-circle"></i></button>
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
<form method="post" action="espace-utilisateur">
<div class="modal fade" id="deleteItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="container">
                    <div class="row colorLogo2">
                        <h3 class="mt-2 text-center" id="staticBackdropLabel">Suppression</h3>
                    </div>
                </div>
                <div class="modal-body container">
                    <div class="row">
                        <p class="text-center text-white">Voulez-vous supprimer votre compte ? Cette action sera irréversible.</p>
                    </div>
                </div>
                <div class="modal-footer colorLogo2 ">
                    <button type="button" class="btn btn-outline-secondary ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-secondary  me-md-5 me-2" name="deleteUser" >Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</form>



<?php require 'assets/template/footer.php'; ?>