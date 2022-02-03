<?php require_once 'admin/models/usersModel.php'; ?>
<?php require_once 'controllers/myDashboardController.php'; ?>
<?php require 'assets/template/header.php'; ?>




<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Mes Mods</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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
                        <a class="dropdown-item text-decoration-none" href="ajouter-un-avis">Mes avis</a>
                    </div>
                </div>
            </div>


            <div class="col py-3 text-start">
                <div class="col-sm-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 mx-auto mb-5 mt-4 shadow">


                                <!----------------------------------------- formulaire mods ------------------>
                                <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>


                                    <form action="addListmodadmin.php" method="POST" id="transparent" enctype="multipart/form-data">
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
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <p class="text-white">Mes mods</p>
                    <table class="table">
                        <thead class="text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mod</th>
                                <th scope="col">Date de parution</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






    <?php require 'assets/template/footer.php'; ?>