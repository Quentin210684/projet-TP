<?php
session_start();
require_once 'admin/models/database.php';
require_once 'admin/models/gamesModel.php';
require_once 'admin/models/usersModel.php';
require_once 'admin/models/evaluationModel.php';
require_once 'admin/models/commentModel.php';
require_once 'controllers/timingController.php';
require 'assets/template/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-4 text-start" id="neon">
            La selection du moment
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-sm-12 mt-3 mb-3 border-bottom text-white">
        <h5 class="selection du moment">Qu'est ce que c'est ?</h5>
        <p>C'est la sélection d'un jeu qui est en accès anticipé et qui a été approuvé et testé par un panel de joueur qui ont participés au Game test.
            Le but est d'apporter un avis constructif, de savoir les points forts et les points faibles sur le jeu afin que chaque joueur se fasse son idée.
        <p>La sélection du moment concernera des jeux sortis récemment, les avis pourront aussi bien être positif que negatif.</p>

    </div>
    <div class="row">
        <div class="col-sm-12 mb-4">
            <div class="row">
                <?php foreach ($gameNew as $timing) { ?>
                    <div class="col sm-6 mt-4">
                        <img src="assets/img/<?= $timing->picture ?>" class="card-img-top img-fluid" alt="image jeux">
                    </div>
                <?php } ?>

                <div class="col sm-6">
                    <div class="col-sm-12">
                        <p class="h4 text-white text-center">Evaluations</p>
                        <div class="row justify-content-center text-white mb-4 auto">
                            <?php foreach ($evaluationList as $e) { ?>
                                <div class="col-sm-3 mb-3 bg-dark bg-opacity-50">
                                    <ul>
                                        <li class="deleteLi mt-2 fw-bolder"><?= $e->name ?></li>
                                        <?php foreach ($commentListUsers as $c) { ?>
                                            <li class="deleteLi"> commentaires : <?= $c->commentCount ?></li>
                                        <?php } ?>
                                        <?php foreach ($evaluationListUsers as $eva) { ?>
                                            <li class="deleteLi"> évaluations : <?= $eva->evaluationCount ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <div class="col-sm-9 mb-3 bg-dark bg-opacity-75">
                                    <p class="mt-2">
                                        <?php for ($i = 1; $i <= $e->rating; $i += 1) { ?>
                                            <i class="fas fa-star star"></i>
                                        <?php } ?>
                                        <?php for ($i = 5; $i > $e->rating; $i -= 1) { ?>
                                            <i class="far fa-star star"></i>
                                        <?php } ?>
                                    </p>
                                    <p class="fst-italic fw-bolder">Evaluation publiée le <?= $e->date ?> </p>
                                    <p><?= $e->content ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <?php foreach ($evaluationNote as $eval) { ?>

                    <div class="col sm-6">
                        <p class="h2 text-white text-center mt-5">Note moyenne</p>
                        <p class="mt-2 sizeStars">
                            <?php for ($i = 1; $i <= $eval->rating; $i += 1) { ?>
                                <i class="fas fa-star star"></i>
                            <?php } ?>
                            <?php for ($i = 5; $i > $eval->rating; $i -= 1) { ?>
                                <i class="far fa-star star"></i>
                            <?php } ?>
                        </p>
                        <p class="sizeStars text-white"><?= $eval->rating ?>/5</p>
                    </div>
                    <div class="col sm-6">
                        <div class="col-sm-12">
                            <div class="row justify-content-center text-white mb-4 auto">
                            <p class="h2 text-white text-center">Résumé</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>



<?php require 'assets/template/footer.php'; ?>