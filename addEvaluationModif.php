<?php
session_start();
require_once 'admin/models/database.php'; ?>
<?php require_once 'admin/models/gamesModel.php'; ?>
<?php require_once 'admin/models/usersModel.php'; ?>
<?php require_once 'admin/models/evaluationModel.php'; ?>
<?php require_once 'controllers/evaluationModifController.php'; ?>
<?php require 'assets/template/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm ms-md-5 mt-3 text-start" id="neon">
            Evaluation
        </div>

        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-sm-6">
                    <p class="h4 text-center">Evaluation</p>

                    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>

                        <form action="user-modification-avis_<?= $evaluation->id ?>" method="POST">


                            <div class="stars mb-3 mt-3">
                                <label class="rate">
                                    <input type="radio" name="rating" id="star1" value="1">
                                    <div class="face"></div>
                                    <i class="far fa-star star one-star"></i>
                                </label>
                                <label class="rate">
                                    <input type="radio" name="rating" id="star2" value="2">
                                    <div class="face"></div>
                                    <i class="far fa-star star two-star"></i>
                                </label>
                                <label class="rate">
                                    <input type="radio" name="rating" id="star3" value="3">
                                    <div class="face"></div>
                                    <i class="far fa-star star three-star"></i>
                                </label>
                                <label class="rate">
                                    <input type="radio" name="rating" id="star4" value="4">
                                    <div class="face"></div>
                                    <i class="far fa-star star four-star"></i>
                                </label>
                                <label class="rate">
                                    <input type="radio" name="rating" id="star5" value="5">
                                    <div class="face"></div>
                                    <i class="far fa-star star five-star"></i>
                                </label>
                            </div>


                            <div class="col-sm-12 mb-4 mx-auto ">
                                <p>Veuillez d??crire ce que vous avez aim?? ou n'avez pas aim?? ?? propos de ce jeu.
                                    Veuillez ??galement indiquer si vous le recommandez ?? d'autres utilisateurs.
                                    Veillez ?? garder un langage correct et ?? respecter les r??gles du site. Votre ??valuation ne sera pas publi??es s'il
                                    n'y a pas de description.</p>
                                </p>
                            </div>


                            <div class="col-sm-12 mb-4 mt-4">
                                <label for="content">R??sum??</label>
                                <textarea class="form-control <?= isset($formErrors['content']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['content'] ?>" name="content" id="content" style="height: 100px"></textarea>


                                <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['content'] ?></p>

                                <div class="mb-3 col-sm-11 mt-5 text-end">
                                    <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Modifier</button>
                                    <a href="mes-avis" class="btn btn-outline-dark text-white border border-white" title="Retour"><i class="fas fa-reply"></i></a>

                                </div>
                        </form>
                    <?php } else { ?>
                        <div class="text-center text-white mt-4 fs-5">
                            <p>Bonjour, votre ??valuation ?? bien ??t?? modifier</p>
                        </div>
                        <div class="text-center text-white mt-4 fs-5">
                            <p><a class="text-decoration-none text-white" href="administration">Retourner ?? l'accueil</a> </p>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>




<?php require 'assets/template/footer.php'; ?>