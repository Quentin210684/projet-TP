<?php
session_start();
require_once 'admin/models/database.php';
require_once 'admin/models/modsModel.php';
require_once 'controllers/modsListController.php';
require 'assets/template/header.php'; ?>

<!-------------------------------------------------------Page centrale Mods------------------------------------------->
<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-3 text-start" id="neon">
            MODS
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mt-3 mb-5 text-white">
            <p>Créer, trouver et télécharger des mods pour votre jeu. Parcourez les pages suivantes pour trouver du contenu créé par les joueurs et joueuses pour vos jeux. La création de contenu vous intéresse ?
                <a href="connexion" class="figure-img text-decoration-none"> Connectez-vous</a> pour en savoir plus !
            </p>
        </div>
        <div class="col-md-4 mt-2 text-white">
            <nav class="navbar navbar-transparent bg-transparent">
                <div class="container-fluid justify-content-end me-5 mt-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Chercher un mod..." aria-label="Search">
                        <button class="btn btn-outline-dark border border-white text-start text-white" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-4 mb-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($modPageList as $mo) { ?>
                        <div class="col-sm mt-4">
                            <a href="pageMods_<?= $mo->id ?>" class="text-decoration-none text-dark">
                                <div class="card h-100 animate__animated animate__zoomInDown">
                                    <div class="card-header">
                                        <p class="card-title d-flex h5"><span class="me-auto"><?= $mo->title ?></p>
                                        <p class="card-text"><?= $mo->releaseDate ?></p>
                                    </div>
                                    <img src="<?= $mo->picture ?>" class="card-img-top img-fluid" alt="image jeux">

                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'assets/template/footer.php'; ?>