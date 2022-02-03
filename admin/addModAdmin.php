<?php require_once 'models/usersModel.php'; ?>
<?php require_once 'controllers/addModAdminController.php'; ?>
<?php require '../assets/template/header.php'; ?>




<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Ajouter un Mods</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 mx-auto mb-5 mt-4 shadow">


                            <!----------------------------------------- formulaire mods ------------------>
                            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>


                                <form action="addListmodadmin.php" method="POST" id="transparent" enctype="multipart/form-data">
                                    <div class="row g-3 mt-3 text-center text-dark">
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


                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control <?= isset($formErrors['message']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['message'] ?>" placeholder="Laissez un message..." name="message" id="floatingTextarea2" style="height: 100px"></textarea>
                                                    <label for="floatingTextarea2">Votre message</label>

                                                    <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['message'] ?></p>


                                                </div>

                                                <div class="mb-2">
                                                    <label for="formFileMultiple" class="form-label"></label>
                                                    <input class="form-control" type="file" name="formFileMultiple" id="formFileMultiple" multiple>
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
            </div>
        </div>
    </div>
</div>






<?php require '../assets/template/footer.php'; ?>