<?php
session_start();
?>
<?php require_once 'admin/models/database.php';?>
<?php require_once 'admin/models/usersModel.php';?>
<?php require_once 'controllers/contactController.php'; ?>
<?php require 'assets/template/header.php'; ?>






<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-4 text-start" id="neon">
            Contact
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto mb-5 mt-3 border-3 shadow video img-fluid" id="transparent">

            <!----------------------------------------- formulaire de contact et regex ------------------>

            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>

                <form action="contact.php" method="POST">

                    <div class="row g-3 mt-3 text-center text-dark">
                        <h2 class="text-white">Formulaire de contact</h2>
                        <div class="col-md-6 mx-auto">
                            <div class="col-ms-6">

                                <div class="text-start text-white mt-3 mb-2">
                                    <label for="lastName" class="form-label">Utilisateur</label>
                                    <input type="text" class="form-control <?= isset($formErrors['user']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['user'] ?>" id=" lastName" name="user">

                                    <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['user'] ?></p>
                                </div>

                                <div class="text-start text-white mb-3">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control <?= isset($formErrors['email']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['email'] ?>" id="inputEmail4" name="email">

                                    <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['email'] ?></p>
                                </div>

                                <div class="text-start text-white mb-3">
                                    <label for="subject" class="form-label">Sujet</label>
                                    <input type="text" class="form-control <?= isset($formErrors['subject']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['subject'] ?>" id=" subject" name="subject">

                                    <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['subject'] ?></p>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control <?= isset($formErrors['message']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['message'] ?>" placeholder="Laissez un message..." name="message" id="floatingTextarea4" style="height: 100px"></textarea>
                                    <label for="floatingTextarea4">Votre message</label>

                                    <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['message'] ?></p>
 

                                </div>

                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <button class="btn btn-outline-dark text-white border border-white" type="submit">Soumettre votre demande</button>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <div class="text-center text-white mt-4 fs-5">
                    <p>Bonjour, <?php echo $user->name . ' merci de votre message. Nous reviendrons vers vous rapidement.' ?></p>
                </div>
                <div class="text-end text-white mt-4 fs-5">
                    <p><a class="text-decoration-none text-white" href="index.php">Retourner à l'accueil</a> </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php require 'assets/template/footer.php'; ?>