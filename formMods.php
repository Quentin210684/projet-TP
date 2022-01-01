<?php require 'assets/template/header.php'; ?>
<?php require_once 'controller/formControllers.php'; ?>



<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto mb-5 mt-4 shadow">


            <!----------------------------------------- formulaire mods ------------------>
            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>


                <form action="" method="POST" id="transparent">
                    <div class="test row g-3 mt-3 text-center text-dark">
                        <h2 class="text-white">Proposez votre Mod</h2>
                        <div class="col-md-6 mx-auto">
                            <div class="col-ms-6">
                                <div class="mt-3 mb-3 text-start text-white">
                                    <label for="lastName" class="form-label">Utilisateur :</label>
                                    <input type="text" class="form-control <?= isset($formErrors['user']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['user'] ?>" id=" lastName" name="user">

                                    <p class="invalid-feedback text-dark fw-bold"><?= @$formErrors['user'] ?></p>
                                </div>

                                <div class="mb-3 text-start text-white">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control <?= isset($formErrors['email']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['email'] ?>" id="inputEmail4" name="email">

                                    <p class="invalid-feedback text-dark fw-bold"><?= @$formErrors['email'] ?></p>
                                </div>


                                <div class="form-floating text-white">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="message" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Votre message</label>
                                </div>

                                <div class="mb-2">
                                    <label for="formFileMultiple" class="form-label"></label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <button class="btn btn-primary" type="submit">Soumettre votre Mod</button>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <div class="text-center text-white mt-4 fs-5">
                    <p>Merci, <?php echo $user . ' Nous reviendrons vers vous après vérification. ' ?></p>
                </div>
                <div class="text-end text-white mt-4 fs-5">
                    <p><a class="text-decoration-none text-white" href="index.php">Retourner à l'accueil</a> </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php require 'assets/template/footer.php'; ?>