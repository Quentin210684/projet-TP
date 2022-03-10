<?php
session_start();
require_once 'admin/models/database.php'; ?>
<?php require_once 'admin/models/modsModel.php'; ?>
<?php require_once 'admin/models/evaluationModel.php'; ?>
<?php require_once 'admin/models/commentModel.php'; ?>
<?php require_once 'admin/models/languagesModel.php'; ?>
<?php require_once 'controllers/modController.php'; ?>
<?php require 'assets/template/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 mt-3 mb-3">
            <div class="col-sm-12 mt-2 mx-auto border-3 border border-dark">
                <img src="<?= $modList->picture ?>" class="card-img-top img-fluid" alt="image jeux">
            </div>

            <div class="col-sm-12 mt-4 mb-3 border-3 border border-dark">
                <h3 class="fw-bolder text-dark text-center">Résumé</h3>
                <p class="text-white ms-3"><?= $modList->summary ?></p>
            </div>

        </div>

        <div class="col-sm-7 mt-5 mb-4 text-white">
            <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="populary-tab" data-bs-toggle="tab" data-bs-target="#populary" type="button" role="tab" aria-controls="populary" aria-selected="true">Les plus populaires</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="download-tab" data-bs-toggle="tab" data-bs-target="#download" type="button" role="tab" aria-controls="download" aria-selected="false">Les plus téléchargés</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="play-tab" data-bs-toggle="tab" data-bs-target="#play" type="button" role="tab" aria-controls="play" aria-selected="false">Le plus joué</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="recent-tab" data-bs-toggle="tab" data-bs-target="#recent" type="button" role="tab" aria-controls="recent" aria-selected="false">Les plus récents</button>

                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="populary" role="tabpanel" aria-labelledby="populary-tab"><img src="<?= $modList->file ?>" class="img-fluid rounded-start imgSize2" alt="image jeux"></div>
                <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab"></div>
                <div class="tab-pane fade" id="play" role="tabpanel" aria-labelledby="play-tab"></div>
                <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab"></div>

            </div>
        </div>
    </div>
</div>
<div class="text-end me-5">
    <a href="mods" class="btn btn-outline-dark text-white border border-white" title="Retour"><i class="fas fa-reply"></i></a>
</div>

<?php require 'assets/template/footer.php'; ?>