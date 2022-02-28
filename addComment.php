<?php
session_start();
require_once 'admin/models/database.php'; ?>
<?php require_once 'admin/models/articlesModel.php'; ?>
<?php require_once 'admin/models/usersModel.php'; ?>
<?php require_once 'admin/models/commentModel.php'; ?>
<?php require_once 'controllers/addCommentController.php'; ?>
<?php require 'assets/template/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm ms-md-5 mt-3 text-start" id="neon">
            Commentaire
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <p class="h4 text-center">Commentaire</p>

                    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>

                        <form action="commentaire_<?= $_GET['id'] ?>" method="POST">

                            <div class="col-sm-4 mb-4 mt-4 text-white">
                                <label for="titleArticle" class="form-label">Titre</label>
                                <input type="text" class="form-control <?= isset($formErrors['titleArticle']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['titleArticle'] ?>" id=" titleArticle" name="titleArticle">

                                <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['titleArticle'] ?></p>
                            </div>

                            <div class="col-sm-12 mb-4 mx-auto ">
                                <p>Veuillez décrire ce que vous avez aimé ou n'avez pas aimé à propos de cet article.
                                    Veillez à garder un langage correct et à respecter les règles du site. Votre commentaire ne sera pas publiés s'il
                                    n'y a pas un minimum de phrase.</p>
                                </p>
                            </div>


                            <div class="col-sm-12 mb-4 mt-4">
                                <label for="floatingTextarea3">Résumé</label>
                                <textarea class="form-control <?= isset($formErrors['content']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['content'] ?>" name="content" id="floatingTextarea3" style="height: 100px"></textarea>


                                <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['content'] ?></p>

                                <div class="mb-3 col-sm-11 mt-5 text-end">
                                    <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Publiez</button>
                                    <a href="page-Article-Presse_<?= $articlesDetails->id ?>" class="btn btn-outline-dark text-white border border-white" title="Retour"><i class="fas fa-reply"></i></a>

                                </div>
                        </form>
                    <?php } else { ?>
                        <div class="text-center text-white mt-4 fs-5">
                            <p>Bonjour, votre commentaire à bien été ajoutez</p>
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




<?php require 'assets/template/footer.php'; ?>