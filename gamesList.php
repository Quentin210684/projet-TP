<?php
session_start();
require_once 'admin/models/database.php';
require_once 'admin/models/gamesModel.php';
require_once 'admin/models/typesModel.php';
require_once 'admin/models/platformsModel.php';
require_once 'admin/models/graphismsModel.php';
require_once 'controllers/gamesListController.php';
require 'assets/template/header.php'; ?>
<!-------------------------------------------------------Page centrale jeux------------------------------------------->
<!--Finir de completez les alt des images-->


<!---------------------------------------------------------------Liste deroulante ------------------------------------------------------>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 mt-2 p-3 mb-3 border-3 border-end border-dark">
            <h2 id="neon" class="border-3 border-bottom border-dark mb-5">JEUX</h2>
            <div class=" size col-sm fs-5 text-white">
                <label for="genre-select">Type</label>
            </div>
            <div class="col-sm mt-3">
                <select name="id_types" id="" class="form-select">
                    <?php foreach ($typesList as $t) { ?>
                        <option value="<?= $t->id ?>"><?= $t->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class=" size col-sm fs-5 mt-5 text-white">
                <label for="genre-select">Graphisme</label>
            </div>
            <div class="col-sm mt-3">
                <select name="id_graphisms" id="" class="form-select">
                    <?php foreach ($graphismsList as $g) { ?>
                        <option value="<?= $g->id ?>"><?= $g->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class=" size col-sm fs-5 mt-5 text-white">
                <label for="genre-select">Plateforme</label>
            </div>
            <div class="col-sm mt-3">
                <select name="id_platforms" id="" class="form-select">
                    <?php foreach ($platformsList as $p) { ?>
                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class=" size col-sm fs-5 mt-5 d-grid">
                <button class="btn btn-outline-dark text-white border border-white" type="submit" id="button search" >Rechercher</button>
            </div>
        </div>

        <!-----------------------------------------------Changer les jeux dans la page------------------------------------------------------------------------------------>

        <div class="col-sm-9 mt-5 ms-md-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <?php
                    if (count($gamesList) > 0) {
                        foreach ($gamesList as $gamesDetails) {
                    ?>
                            <div class="col-sm animate__animated animate__zoomInDown">
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
                        <?php
                        }
                    } else {
                        ?>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="alert alert-info p-5 m-5 text-center text-white bg-dark ">
                                    <i class="fas fa-exclamation-triangle fs-5"></i> Aucun jeux ne correspond ?? votre recherche !
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>

                </div>
                <div class="row ">
                    <div class="mt-4 mb-2 ms-auto col-auto">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php if ($_GET['page'] == 1) {
                                echo 'disabled';
                                 } ?>"><a class="page-link" href="<?= '?page=' . ($_GET['page'] - 1); ?>">Previous</a></li>
                                <li class="page-item <?php if ($_GET['page'] - 1 == 0) {
                                echo 'd-none';
                                } ?>"><a class="page-link" href="<?= '?page=' . ($_GET['page'] - 1); ?>"><?= $_GET['page'] - 1 ?></a></li>
                                <li class="page-item active "><a class="page-link" href="#"><?= $_GET['page'] ?></a></li>
                                <li class="page-item <?php if ($_GET['page'] + 1 == $pageNumber + 1) {
                                echo 'd-none';
                                } ?>"><a class="page-link" href="<?= '?page=' . ($_GET['page'] + 1); ?>"><?= $_GET['page'] + 1 ?></a></li>
                                <li class="page-item <?php if ($_GET['page'] == $pageNumber) {
                                echo 'disabled';
                                } ?>"><a class="page-link" href="<?= '?page=' . ($_GET['page'] + 1); ?>">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-sm  mt-2 ms-2 mb-2 animate__animated animate__zoomInDown col-md-3">
                            <figure class="figure border border-3 border-outset border-dark">
                                <img src="assets/img/" id="logic" class="img-fluid card-img2 figure-img rounded mb-0" alt="...">
                                <div class="d-flex align-items-center colorLogo2 fw-bold">
                                    <p class="size figure-caption mt-2 mb-1 ms-1 fs-6 col-sm me-md-2"><a href="logicworldgamepage.php" class="text-decoration-none text-white"></a></p>
                                    <p class="col-sm mt-1 mb-1 text-end "><img src="assets/img/logo windows reduit.png"><img src="assets/img/logo mac os reduit.png"></p>
                                </div>
                            </figure>
                        </div> -->


<?php require 'assets/template/footer.php'; ?>