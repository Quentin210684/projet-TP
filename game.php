<?php
session_start();
require_once 'admin/models/database.php'; ?>
<?php require_once 'admin/models/gamesModel.php'; ?>
<?php require_once 'admin/models/usersModel.php'; ?>
<?php require_once 'admin/models/evaluationModel.php'; ?>
<?php require_once 'admin/models/commentModel.php'; ?>
<?php require_once 'admin/models/languagesModel.php'; ?>
<?php require_once 'controllers/gameController.php'; ?>
<?php require 'assets/template/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 mt-3 mb-3 mx-auto">
            <div class="col-sm-12 mt-2 mx-auto border-3 border border-dark">
                <h3 class="fw-bolder text-dark text-center">Fiche de jeux</h3>
                <p class="size text-white fs-5 ms-2"><i class="fas fa-pencil-alt text-dark"></i> Développeur : <?= $game->developpers ?></p>
                <p class="size fs-5 text-white ms-2"><i class="far fa-lightbulb text-dark"></i> Genre : <?= $game->typesName ?></p>
                <p class="size text-white fs-5 ms-2"><i class="far fa-calendar-alt text-dark"></i> Date de parution : <?= $game->releaseDate ?></p>
                <p class="size fs-5 text-white ms-2"><i class="fas fa-external-link-alt text-dark"></i> Date de sortie en accès anticipé : <?= $game->earlyExitDate ?></p>
                <div class="d-flex">
                    <p class="size fs-5 text-white ms-2"><img src="assets/img/icone steam.png"><a href="https://store.steampowered.com/app/1210320/Potion_Craft_Alchemist_Simulator/" class="text-decoration-none text-white">Store</a></p>
                </div>
            </div>
            <div class="col-sm-12 mt-4 border-3 border border-dark" id="gameWindows">
                <h3 class="fw-bolder text-dark text-center">Langues</h3>
                <table class="table text-dark">
                    <thead class="text-white">
                        <tr>
                            <th scope="col-sm">#</th>
                            <th scope="col-sm">Interface</th>
                            <th scope="col-sm">Audio</th>
                            <th scope="col-sm">Sous-titre</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        <?php foreach ($languagesList as $language) { ?>
                            <tr>
                                <th scope="row"><?= $language->name ?></th>
                                <td><i class="fas fa-times ms-3"></i></td>
                                <td><i class="fas fa-times ms-3"></i></td>
                                <td><i class="fas fa-times ms-3"></i></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 mt-4 mb-3 border-3 border border-dark">
                <h3 class="fw-bolder text-dark text-center">Résumé</h3>
                <p class="text-white ms-3"><?= $game->summary ?></p>
            </div>
        </div>

        <div class="col-sm-7 mt-5 text-white">
            <div class="ratio ratio-16x9">
                <iframe src="<?= $game->trailer ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <td class="align-middle ">
                <a href="evaluation_<?= $_GET['id']  ?>" class="btn btn-primary text-center mt-5" title="ajouter un avis"> Ecrire une évaluation pour <?= $game->title ?> <i class="fas fa-pen-alt"></i></a>
            </td>

        </div>
    </div>

    <div class="col-sm-auto mt-5 border-3 border-top border-dark">
        <h3 class=" fw-bolder text-dark text-center mb-4  border-3 border-bottom border-dark">-Evaluations-</h3>
        <div class="container">
            <div class="row justify-content-center text-white mb-4">
                <?php foreach ($evaluationList as $e) { ?>
                    <div class="col-sm-2 mb-3 bg-dark bg-opacity-50">
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

                    <div class="col-sm-10 mb-3 bg-dark bg-opacity-75">
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

<?php require 'assets/template/footer.php'; ?>