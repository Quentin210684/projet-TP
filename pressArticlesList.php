<?php
session_start();
require_once 'admin/models/database.php';
require_once 'admin/models/gamesModel.php';
require_once 'admin/models/articlesModel.php';
require_once 'controllers/articlesListController.php';
require 'assets/template/header.php'; ?>
<!---------------------------------------------------------Articles page------------------------------------------------------------------------------------------------------------------------------------------->

<div class="container">
    <div class="row">
        <div class="col-sm ms-md-5 mt-3 text-start" id="neon">
            Articles
        </div>
    </div>
    <div class="row mt-5 mb-5 justify-content-center">
        <?php foreach ($articlesList as $articlesDetails) { ?>
            <div class="col-sm-5 mt-3">
                <a href="page-Article-Presse_<?= $articlesDetails->id ?>" class="text-decoration-none text-dark">
                    <div class="card img-fluid" style="width: 30rem;" data-aos="flip-up" data-aos-duration="1500" style="width: 30rem;">
                        <img src="assets/img/<?= $articlesDetails->picture ?>" class="card-img-top img-fluid" alt="image jeu">
                        <div class="card-body">
                            <h5 class="card-title fw-bold formPoliceArticle"><?= $articlesDetails->title ?></h5>
                            <p class="card-text formPoliceArticle"></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item formPoliceArticle"><?= $articlesDetails->headline ?></li>
                            <li class="list-group-item formPoliceArticle"><?= $articlesDetails->publicationDate ?></li>
                        </ul>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>


<?php require 'assets/template/footer.php'; ?>