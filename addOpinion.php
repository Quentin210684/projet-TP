<?php
session_start();
require_once 'admin/models/database.php'; ?>
<?php require_once 'admin/models/gamesModel.php'; ?>
<?php require_once 'admin/models/evaluationModel.php'; ?>
<?php require_once 'controllers/evaluationController.php'; ?>
<?php require 'assets/template/header.php'; ?>




<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Mes avis</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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
                        <a class="dropdown-item text-decoration-none" href="mes-avis">Mes avis</a>
                        <a class="dropdown-item text-decoration-none" href="mes-commentaires">Mes commentaires</a>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="row justify-content-center">

                    <div class="container-fluid">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Contenu</th>
                                        <th scope="col">Evaluation</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($evaluationList as $evaluation) { ?>

                                        <tr class="text-center text-white">
                                            <th class="align-middle" scope="row"><?= $evaluation->id ?></th>
                                            <td class="align-middle"><img src="assets/img/<?= $evaluation->picture ?>" class="imgSize"></td>
                                            <td class="align-middle"><?= $evaluation->content ?></td>
                                            <td class="align-middle"><?php for ($i = 1; $i <= $evaluation->rating; $i += 1) { ?>
                                                    <i class="fas fa-star star"></i>
                                                <?php } ?>
                                                <?php for ($i = 5; $i > $evaluation->rating; $i -= 1) { ?>
                                                    <i class="far fa-star star"></i>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle"><?= $evaluation->date ?></td>
                                            <td class="align-middle">
                                                <a href="user-modification-avis_<?= $evaluation->id ?>" class="btn btn-warning" title="Modifier un avis"><i class="fas fa-user-edit"></i></a>
                                            </td>
                                            <td class="align-middle">
                                                <button type="button" class="btn btn-danger" data-bs-whatever="<?= $evaluation->id ?>" data-bs-toggle="modal" data-bs-target="#deleteItem" title="Supprimer un avis"><i class="far fa-times-circle"></i></button>
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
    <form method="post" action="mes-avis">
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
                            <p class="text-center text-white">Voulez-vous supprimer cet avis ?</p>
                            <input type="hidden" name="deleteEvaluation" id="deleteInputOpinion">
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
</div>












<?php require 'assets/template/footer.php'; ?>