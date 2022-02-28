<?php
session_start();
require_once 'models/database.php'; ?>
<?php require_once 'models/usersModel.php'; ?>
<?php require_once 'controllers/usersListAdminController.php'; ?>
<?php require '../assets/template/header.php'; ?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2"> Liste des utilisateurs</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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
                                            <td>
                                                <button type="button" class="btn btn-danger" data-bs-whatever="<?= $userDetails->id ?>" data-bs-toggle="modal" data-bs-target="#deleteItem" title="Supprimer un utilisateurs"><i class="far fa-times-circle"></i></button>
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

<form method="post" action="admin-liste-des-utilisateurs">
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
                        <p class="text-center text-white">Voulez-vous supprimer cette utilisateur ?</p>
                        <input type="hidden"  name="deleteUser" id="deleteInput">
                    </div>
                </div>
                <div class="modal-footer colorLogo2 ">
                    <button type="button" class="btn btn-outline-secondary ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-secondary  me-md-5 me-2" >Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</form>







<?php require '../assets/template/footer.php'; ?>