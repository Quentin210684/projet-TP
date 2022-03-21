<?php
session_start();
require_once 'models/database.php'; ?>
<?php require_once 'models/gamesModel.php'; ?>
<?php require_once 'models/typesModel.php'; ?>
<?php require_once 'models/graphismsModel.php'; ?>
<?php require_once 'models/platformsModel.php'; ?>
<?php require_once 'models/gamesLanguagesModel.php'; ?>
<?php require_once 'models/modsLanguagesModel.php'; ?>
<?php require_once 'models/languagesModel.php'; ?>
<?php require_once 'controllers/addGameAdminController.php'; ?>
<?php require '../assets/template/header.php'; ?>




<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Ajouter un jeu</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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

            <div class="col-sm-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 shadow mx-auto">
                            <div class="col-sm-12 mt-3 mb-3 text-center">
                                <h3>Mes Jeux</h3>
                            </div>

                            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>

                                <form action="admin-ajouter-un-jeu" method="POST" enctype="multipart/form-data">


                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="picture" class="form-label">Image</label>
                                        <input class="form-control form-control-sm" name="picture" id="formFileSm1" type="file">
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" class="form-control <?= isset($formErrors['title']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['title'] ?>" id=" title" name="title">

                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['title'] ?></p>
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="developpers" class="form-label">Développeur</label>
                                        <input type="text" class="form-control <?= isset($formErrors['developpers']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['developpers'] ?>" id=" developpers" name="developpers">

                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['developpers'] ?></p>
                                    </div>

                                    <div class="col-sm-8 mt-3 mx-auto text-white">
                                        <label for="Types" class="form-label">Choisissez le type</label>
                                    </div>
                                    <div class="col-sm-8 mb-3 mx-auto text-white">
                                        <select name="id_types" id="" class="form-select">
                                            <?php foreach ($typesList as $t) { ?>
                                                <option value="<?= $t->id ?>"><?= $t->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-8 mt-3 mx-auto text-white">
                                        <label for="Types" class="form-label">Choisissez le graphisme</label>
                                    </div>
                                    <div class="col-sm-8 mb-3 mx-auto text-white">
                                        <select name="id_graphisms" id="" class="form-select">
                                            <?php foreach ($graphismsList as $g) { ?>
                                                <option value="<?= $g->id ?>"><?= $g->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-8 mt-3 mx-auto text-white">
                                        <label for="Types" class="form-label">Choisissez la plateforme</label>
                                    </div>
                                    <div class="col-sm-8 mb-3 mx-auto text-white">
                                        <select name="id_platforms" id="" class="form-select">
                                            <?php foreach ($platformsList as $p) { ?>
                                                <option value="<?= $p->id ?>"><?= $p->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>


                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="releaseDate" class=" form-label">Date de parution</label>
                                        <input type="date" class="form-control" id=" releaseDate" name="releaseDate">
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="earlyExitDate" class="form-label">Date sortie anticipé</label>
                                        <input type="date" class="form-control" id=" earlyExitDate" name="earlyExitDate">
                                    </div>

                                    <div class="col-sm-8 mt-3 mx-auto text-white">
                                        <label for="Types" class="form-label">Choisissez le langage</label>
                                    </div>
                                    <div class="col-sm-8 mb-3 mx-auto text-white">
                                        <select class="selectpicker form-control" name="id_languages" multiple data-max-options="2">
                                            <?php foreach ($languagesList as $language) { ?>
                                                <option value="<?= $language->id ?>"><?= $language->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="url" class="form-label">Trailer</label>
                                        <input class="form-control form-control-sm" id="url" name="trailer" type="url" pattern="https://.*">
                                    </div>


                                    <div class="col-sm-8 mt-3 mb-4 mx-auto text-white">
                                        <label for="floatingTextarea2">Résumé</label>
                                        <textarea class="form-control <?= isset($formErrors['summary']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['summary'] ?>" name="summary" id="floatingTextarea2" style="height: 100px"></textarea>

                                        <!-- Si l'erreur existe dans l'input il sera signalé afin de pouvoir le rectifier-->
                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['summary'] ?></p>
                                    </div>

                                    <div class="mb-3 col-sm-11 mt-5 text-end">
                                        <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Publiez</button>
                                        <a href="admin-liste-des-jeux" class="btn btn-outline-dark text-white border border-white" title="Retour"><i class="fas fa-reply"></i></a>

                                    </div>

                                </form>
                            <?php } else { ?>
                                <div class="text-center text-white mt-4 fs-5">
                                    <p>Bonjour, <?php echo $game->title . ' à bien été ajoutez' ?></p>
                                </div>
                                <div class="text-center text-white mt-4 fs-5">
                                    <p><a class="text-decoration-none text-white" href="administration">Retourner à l'accueil</a> </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php require '../assets/template/footer.php'; ?>