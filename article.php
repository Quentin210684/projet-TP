<?php
session_start();
require_once 'admin/models/database.php';
require_once 'admin/models/usersModel.php';
require_once 'admin/models/articlesModel.php';
require_once 'admin/models/evaluationModel.php';
require_once 'admin/models/commentModel.php';
require_once 'controllers/articleController.php';

require 'assets/template/header.php'; ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-2 mb-3">
            <div class="col-sm-12 mt-2 text-white shadow">
                <h3 class="fw-bolder text-dark text-center text-white mb-3"><?= $articlesPress->title ?></h3>
                <p class="text-center"><img src="assets/img/<?= $articlesPress->picture ?>" class="img-fluid image2"></p>
                <h3 class="fw-bolder text-white text-center mt-5"></h3>
                <p class="text-white mt-3"><?= $articlesPress->content ?></p>
                <p class="size text-white fs-5 ms-2"><i class="fas fa-scroll"></i> Nom du journal : <?= $articlesPress->headline ?></p>
                <p class="size text-white fs-5 ms-2"><i class="far fa-calendar-alt"></i> Date de publication : <?= $articlesPress->publicationDate ?> </p>
            </div>
        </div>

        <div class="text-center >
            <td">
            <a href="commentaire_<?= $_GET['id'] ?>" class="btn btn-primary text-center mt-5" title="ajouter un commentaire"> Ecrire un commentaire sur cet article <i class="fas fa-pen-alt"></i></a>
            </td>
        </div>

    </div>
    <div class="col-sm-auto mt-5 border-3 border-top border-dark">
        <h3 class=" fw-bolder text-dark text-center mb-4  border-3 border-bottom border-dark">-Commentaires-</h3>
        <div class="container">
            <div class="row justify-content-center text-white mb-4">
                <?php foreach ($commentList as $c) { ?>
                    <div class="col-sm-2 mb-3 bg-dark bg-opacity-50">
                        <ul>
                            <li class="deleteLi mt-2 fw-bolder"><?= $c->name ?></li>
                            <?php foreach ($commentListUsers as $ca) { ?>
                                <li class="deleteLi"> commentaires : <?= $ca->commentCount ?></li>
                            <?php } ?>
                            <?php foreach ($evaluationListUsers as $eva) { ?>
                                <li class="deleteLi"> évaluations : <?= $eva->evaluationCount ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-sm-10 mb-3 bg-dark bg-opacity-75">
                        <p class="border-bottom fw-bold fst-italic m-0 mt-2"><?= $c->title ?></p>
                        <p class="mt-2 mb-3"><?= $c->content ?></p>
                        <p class="border-top">Commentaire publié le <?= $c->publicationDate ?> </p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php require 'assets/template/footer.php'; ?>