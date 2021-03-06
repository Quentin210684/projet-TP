<?php
session_start();
require_once 'models/database.php';
require_once 'models/modsModel.php';
require_once 'models/usersModel.php';
require_once 'controllers/modsListAdminController.php';
require '../assets/template/header.php'; ?>





<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2"> Liste des Mods</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center text-white">
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Fichier</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Date sortie</th>
                                <td class="align-middle">
                                    <a href="admin-ajouter-un-mod" class="btn btn-primary" title="ajouter un mod"><i class="fas fa-plus"></i></a>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($modList as $modsDetails) { ?>
                                <tr class="text-center text-white">
                                    <th class="align-middle" scope="row"><?= $modsDetails->id ?></th>
                                    <td class="align-middle"><img src="<?= $modsDetails->picture ?>" class="imgSize"></td>
                                    <td class="align-middle"><?= $modsDetails->title ?></td>
                                    <td class="align-middle"><img src="<?= $modsDetails->file ?>" class="imgSize2"></td>
                                    <td class="align-middle"><?= $modsDetails->name ?></td>
                                    <td class="align-middle"><?= $modsDetails->releaseDate ?></td>
                                    <td class="align-middle">
                                        <a href="" class="btn btn-info" title="voir le "><i class="far fa-eye"></i></a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="admin-modification-mod_<?= $modsDetails->id ?>" class="btn btn-warning" title="Modifier "><i class="fas fa-user-edit"></i></a>
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-danger" data-bs-whatever="<?= $modsDetails->id ?>" data-bs-toggle="modal" data-bs-target="#deleteItem" title="Supprimer un mod"><i class="far fa-times-circle"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>

            <form method="post" action="admin-liste-des-mods">
                <div class="modal fade" id="deleteItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="container">
                                <div class="row colorLogo2">
                                    <h3 class="mt-2 text-center text-white" id="staticBackdropLabel">Suppression</h3>
                                </div>
                            </div>
                            <div class="modal-body container">
                                <div class="row">
                                    <p class="text-center text-white">Voulez-vous supprimer ce mod ?</p>
                                    <input type="hidden" name="deleteMod" id="deleteInputMod">
                                </div>
                            </div>
                            <div class="modal-footer colorLogo2 ">
                                <button type="button" class="btn btn-outline-dark text-white border border-white ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-outline-dark text-white border border-white  me-md-5 me-2">Confirmer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="h3 mt-3 text-white text-center">
                <p>-Mods utilisateurs en attente de validation-</p>
            </div>

            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center text-white">
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Fichier</th>
                                <th scope="col">Date sortie</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Date sortie</th>
                                <th scope="col">Validation du mod</th>
                                <td class="align-middle">
                                    <a href="" class="btn btn-primary" title=""><i class="fas fa-plus"></i></a>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center text-white">
                                <th class="align-middle" scope="row">..</th>
                                <td class="align-middle"><img src="" class="imgSize"></td>
                                <td class="align-middle"></td>
                                <td class="align-middle"></td>
                                <td class="align-middle"></td>
                                <td class="align-middle"></td>
                                <td class="align-middle"></td>
                                <td class="align-middle"></td>
                                <td class="align-middle">
                                    <a href="" class="btn btn-info" title="voir le "><i class="far fa-eye"></i></a>
                                </td>
                                <td class="align-middle">
                                    <a href="" class="btn btn-warning" title="Modifier "><i class="fas fa-user-edit"></i></a>
                                </td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-danger" data-bs-whatever="" data-bs-toggle="modal" data-bs-target="#deleteItem" title="Supprimer "><i class="far fa-times-circle"></i></button>
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







<?php require '../assets/template/footer.php'; ?>