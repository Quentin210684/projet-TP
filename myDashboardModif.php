<?php
session_start();
require_once 'admin/models/database.php'; ?>
<?php require_once 'admin/models/usersModel.php'; ?>
<?php require_once 'controllers/myModifDashboardController.php'; ?>
<?php require 'assets/template/header.php'; ?>





<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Mon espace personnel</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <i class="fas fa-angle-double-right fs-4"></i>
                </a></h2>


            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header colorLogo2">
                    <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Dashboard Administrateur</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-white">
                    <div>
                        <a class="dropdown-item text-decoration-none" href="espace-utilisateur">Mon espace</a>
                        <a class="dropdown-item text-decoration-none" href="utilisateur-ajouter-un-mod">Mes Mods</a>
                        <a class="dropdown-item text-decoration-none" href="ajouter-un-avis">Ajouter un avis</a>
                    </div>
                </div>
            </div>

            <div class="col py-3 text-start">
                <div class="row justify-content-center">
                    <div class="text-center text-white mt-4 fs-5">
                        <h3>Modification de profil</h3>
                    </div>

                    <div class="col-sm-4 mb-5 shadow ">

                        <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                            
                            <form action="utilisateur-modification" method="POST">

                                <div class="mb-3 mt-5 col-sm-7">
                                    <label for="lastName" class="form-label text-white">Modifier votre nom d'utilisateur</label>
                                    <input type="text" class="form-control <?= isset($formErrors['user']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['user'] ?>" id=" userUpdate" name="user">

                                    <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['user'] ?></p>

                                </div>

                                <div class="mb-3 mt-5 col-sm-7">
                                    <label for="inputEmail4" class="form-label text-white">Email</label>
                                    <input type="email" class="form-control <?= isset($formErrors['email']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['email'] ?>" id="inputEmail4" name="email">

                                    <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['email'] ?></p>


                                </div>


                                <!-- <div class="mb-3 mt-5 col-sm-7">
                                    <label for="exampleInputPassword" class="form-label text-white">Mot de passe</label>
                                    <input type="password" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['password'] ?>" id="pass" name="password">

                                    <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['password'] ?></p>


                                </div>-->



                                <div class="mb-3 col-sm-11 mt-5 text-end">
                                    <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Modifiez</button>
                                    <a href="espace-utilisateur" class="btn btn-outline-dark text-white border border-white" title="Retour"><i class="fas fa-reply"></i></a>
                                </div>



                            </form>
                        <?php } else { ?>
                            <div class="text-center text-white mt-4 fs-5">
                                <p>Merci, <?php echo $_SESSION['user']->name . ' Votre nom a bien été modifier.' ?></p>
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



<?php require 'assets/template/footer.php'; ?>