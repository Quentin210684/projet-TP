<?php
session_start();
require_once 'admin/models/database.php';
require_once 'admin/models/gamesModel.php';
require_once 'controllers/indexGameController.php';
require 'assets/template/header.php'; ?>
<!--CARROUSEL-->

<div class="container">
    <div class="row">
        <div class="col-sm-7 lg-3 mt-2">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    
                    <?php foreach ($gameCarousel as $game) { ?>
                        <div class="carousel-item <?= $game->id == $gameCarouselLastId->id ? 'active' : '' ?>">
                            <a href="pageJeux_<?= $game->id ?>"><img src="assets/img/<?= $game->picture ?>" class="d-block w-100 img-fluid" alt="<?= $game->picture ?>"></a>
                            <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                                <a href="pageJeux_<?= $game->id ?>" class="news2">Prochainement</a>
                                <p><?= $game->summary ?> ...</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-sm mt-2 border bg-light shadow">
            <div id="selection">La sélection du moment</div>
            <?php foreach ($gameNew as $gn) { ?>
                <div class="clearfix mt-4">
                    <img src="assets\img\<?= $gn->picture ?>" class="col-md-8 float-md-end mb-3 ms-md-3 img-fluid" alt="jeu nouveau">
                    <p><?= $gn->summary ?></p>
                    <a href="selection_moment_<?= $gn->id ?>" class="text-decoration-none">En savoir plus</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!--A découvrir----------------------------------------------------->

<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-4 text-center text-white">
            <h5 id="neon">- A découvrir -</h5>
        </div>
    </div>
</div>


<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container">
    <div class="row row-cols-sm row-cols-md-11 g-2 mt-3 mb-5">
        <div class="row row-cols-1 row-cols-md-4 g-4  ">
            <?php foreach ($gamesListIndex as $gamesDetails) { ?>
                <div class="col-sm animate__animated animate__zoomIn">
                    <a href="pageJeux_<?= $gamesDetails->id ?>" class="text-decoration-none text-dark">
                        <div class="card h-100">
                            <img src="assets/img/<?= $gamesDetails->picture ?>" class="card-img-top img-fluid" alt="image jeux">
                            <div class="card-body">
                                <p class="card-title d-flex h5"><span class="me-auto"><?= $gamesDetails->title ?></span><img src="assets/img/logo windows reduit.png"></p>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>




<?php require 'assets/template/footer.php'; ?>