<?php require_once 'admin/models/usersModel.php';?>
<?php require_once 'controllers/registrationController.php'; ?>
<?php require 'assets/template/header.php'; ?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-4 text-start" id="neon">
            Inscription
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 animate__animated animate__fadeInLeft">
            <div class="col-sm-8 p-3 mt-2 mb-4 mx-auto shadow">
                <div class="d-inline-flex p-auto mb-2 shadow">
                    <img src="assets/img/northguard img.png" class="img-fluid">
                </div>
                <div class="p-auto fw-bold text-white text-center mt-3 fs-5">
                    <h2><label for="chk" aria-hidden="true" class="label">CREEZ UN COMPTE ou <a href="connection.php" class="link-dark">Connectez-vous</a></label></h2>
                </div>

                <!---------------------------------------------formulaire avec regex  -------------------------------->
                <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>

                    <form action="registration.php" method="POST" id="recaptcha">

                        <div class="mb-3 col-sm-5 mx-auto">
                            <label for="lastName" class="form-label">Utilisateur :</label>
                            <input type="text" class="form-control <?= isset($formErrors['user']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['user'] ?>" id=" lastName" name="user">

                            <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['user'] ?></p>

                        </div>

                        <div class="mb-4 col-sm-5 mx-auto">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control <?= isset($formErrors['email']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['email'] ?>" id="inputEmail4" name="email">

                            <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['email'] ?></p>


                        </div>

                        <div class="mb-4 col-sm-5 mx-auto">
                            <label for="exampleInputPassword" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['password'] ?>" id="pass" name="password">

                            <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['password'] ?></p>


                        </div>

                        <div class="mb-4 col-sm-5 mx-auto">
                            <label for="exampleInputPassword1" class="form-label">Confirmez votre mot de passe</label>
                            <input type="password" class="form-control <?= isset($formErrors['confirmPassword']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['confirmPassword'] ?>" id="pass2" name="confirmPassword">

                            <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['confirmPassword'] ?></p>


                        </div>


                        <div class="mb-3 col-sm-11 text-center">
                            <button type="submit" class="g-recaptcha btn btn-outline-dark text-white border border-white" data-sitekey="6Ldt9MwdAAAAAAf4Qhrz49nevcOtbfyWDvYGSnzg" data-callback='onSubmit' data-action='submit' name="send" id="send">envoyez</button>
                        </div>
                        
                    </form>
                    <?php } else { ?>
                        <div class="text-center text-white mt-4 fs-5">
                            <p>Bonjour, <?php echo $user->name . ' merci de votre inscription. Vous allez reçevoir un mail de validation' ?></p>
                        </div>
                        <div class="text-end text-white mt-4 fs-5">
                            <p><a class="text-decoration-none text-white" href="index.php">Retourner à l'accueil</a> </p>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>











<?php require 'assets/template/footer.php'; ?>