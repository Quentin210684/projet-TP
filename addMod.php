<?php require_once 'models/usersModel.php'; ?>
<?php require_once 'controllers/addModController.php'; ?>
<?php require 'assets/template/header.php'; ?>




<div class="container-fluid">
    <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 colorLogo2">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 mt-5 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="dashboard.php" class="nav-link align-middle col">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Jeux</span></a>
                        <ul class="collapse nav flex-column ms-1 submenu" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="gameListadmin.php" class="nav-link "> <span class="d-none d-sm-inline">Liste des jeux</span></a>
                            </li>
                            <li>
                                <a href="addListgameadmin.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un jeu</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Mods</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="adminMod.php" class="nav-link "> <span class="d-none d-sm-inline">Liste des Mods</span></a>
                            </li>
                            <li>
                                <a href="addListmodadmin.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un Mod</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Utilisateurs</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="userAdmin.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter/supprimer un utilisateur</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Articles</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="adminArticl.php" class="nav-link "> <span class="d-none d-sm-inline">Liste des Articles</span></a>
                            </li>
                            <li>
                                <a href="addListarticladmin.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un Article</span></a>
                            </li>
                        </ul>
                    <li>
                        <a href="#submenu5" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Mon Dashboard</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu5" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="myDashboarduser.php" class="nav-link "> <span class="d-none d-sm-inline">Mon espace</span></a>
                            </li>
                            <li>
                                <a href="addModuser.php" class="nav-link "> <span class="d-none d-sm-inline">Mes Mods</span></a>
                            </li>
                            <li>
                                <a href="addOpinionuser.php" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un avis</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col py-3 text-start">
            <h2 id="neon" class="text-start mt-3 mb-5">Mes Mods</h2>
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
    </div>
</div>






<?php require 'assets/template/footer.php'; ?>