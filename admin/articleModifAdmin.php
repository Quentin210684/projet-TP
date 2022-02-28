<?php
session_start();
require_once 'models/database.php'; ?>
<?php require_once 'models/articlesModel.php'; ?>
<?php require_once 'controllers/articleModifAdminController.php'; ?>
<?php require '../assets/template/header.php'; ?>

 

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Modifier un Article</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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
                                <h3>Mes Articles</h3>
                            </div>

                            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>

                                <form action="admin-modification-article_<?=$articles->id ?>" method="POST" enctype="multipart/form-data">

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="picture" class="form-label">Image</label>
                                        <input class="form-control form-control-sm" name="picture" id="formFileSm1" type="file">
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" class="form-control <?= isset($formErrors['title']) ? 'is-invalid' : '' ?> "value="<?= isset($_POST['title']) ? $_POST['title'] : $articlesDetails->title ?>" id=" title" name="title">

                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['title'] ?></p>
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="floatingTextarea2">Résumé</label>
                                        <textarea class="form-control <?= isset($formErrors['content']) ? 'is-invalid' : '' ?> " name="content" id="floatingTextarea2" style="height: 100px"><?= $articlesDetails->content ?></textarea>


                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['content'] ?></p>
                                    </div>


                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="headline" class="form-label">Nom du journal</label>
                                        <input type="text" class="form-control <?= isset($formErrors['headline']) ? 'is-invalid' : '' ?> " value="<?= isset($_POST['headline']) ? $_POST['headline'] : $articlesDetails->headline ?>" id=" headline" name="headline">

                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['headline'] ?></p>
                                    </div>


                                    <!-- <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="publicationDate" class="form-label">Date de publication</label>
                                        <input type="date" class="form-control" id=" title" name="publicationDate">
                                    </div> -->

                                    <!-- <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="time" class="form-label">Heure de publication</label>
                                        <input type="time" class="form-control" id=" time" name="time">
                                    </div> -->

                                    <div class="mb-3 col-sm-11 mt-5 text-end">
                                        <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Publiez</button>
                                        <a href="liste-admin-articles" class="btn btn-outline-dark text-white border border-white" title="Retour"><i class="fas fa-reply"></i></a>

                                    </div>

                                </form>
                            <?php } else { ?>
                                <div class="text-center text-white mt-4 fs-5">
                                    <p>Bonjour, <?php echo $articles->title . ' à bien été modifiez' ?></p>
                                </div>
                                <div class="text-end text-white mt-4 fs-5">
                                    <p><a class="text-decoration-none text-white" href="index.php">Retourner à l'accueil</a> </p>
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