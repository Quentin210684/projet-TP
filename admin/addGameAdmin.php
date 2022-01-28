<?php require 'models/gamesModel.php'; ?>
<?php require 'models/graphismsModel.php'; ?>
<?php require '../assets/template/header.php'; ?>
<?php require_once 'controllers/addGameAdminController.php'; ?>




<div class="container-fluid">
    <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 colorLogo2">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 mt-5 text-white min-vh-100">

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="administration" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Jeux</span></a>
                        <ul class="collapse nav flex-column ms-1 submenu" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="admin-liste-des-jeux" class="nav-link "> <span class="d-none d-sm-inline">Liste des jeux</span></a>
                            </li>
                            <li>
                                <a href="admin-ajouter-un-jeu" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un jeu</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Mods</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link "> <span class="d-none d-sm-inline">Liste des Mods</span></a>
                            </li>
                            <li>
                                <a href="admin-ajouter-un-mod" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un Mod</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Utilisateurs</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="admin-liste-des-utilisateurs" class="nav-link "> <span class="d-none d-sm-inline">Ajouter/supprimer un utilisateur</span></a>
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
                                <a href="admin-ajouter-un-article" class="nav-link "> <span class="d-none d-sm-inline">Ajouter un Article</span></a>
                            </li>
                        </ul>
                    </li>
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
            <h2 id="neon" class="text-start mt-3 mb-5">Ajouter un jeux</h2>
            <div class="col-sm-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 shadow mx-auto">
                            <div class="col-sm-12 mt-3 mb-3 text-center">
                                <h3>Mes Jeux</h3>
                            </div>

                            <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>

                                <form action="addListgameadmin.php" method="POST" enctype="multipart/form-data">


                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="picture" class="form-label">Image</label>
                                        <input class="form-control form-control-sm" name="picture" id="formFileSm1" type="file">
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" class="form-control <?= isset($formErrors['title']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['title'] ?>" id=" title" name="title">

                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['title'] ?></p>
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="title2" class="form-label">Développeur</label>
                                        <input type="text" class="form-control <?= isset($formErrors['title2']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['title2'] ?>" id=" title2" name="title2">

                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['title2'] ?></p>
                                    </div>

                                    <div class="col-sm-8 mt-4 mb-3 mx-auto text-white">
                                        <p>
                                            <a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Choisissez le genre
                                            </a>
                                        </p>
                                        <div class="collapse" id="collapseExample1">
                                            <div class="card card-body">

                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Action</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Adresse</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">aventure</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">beat'em all</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">city-builder</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">combat</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">course</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">craft</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">FPS</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">gestion</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">hack'n slash</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">RPG</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">narratif</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">plateforme</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">reflexion</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">sandbox</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">simulation</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">strategie</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">survie</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">horreur</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <select name="id_graphisms" id="">
                                            <?php foreach ($graphismsList as $g) { ?>
                                                <option value="<?= $g->id ?>"><?= $g->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="releaseDate class=" form-label">Date de parution</label>
                                        <input type="date" class="form-control" id=" releaseDate" name="releaseDate">
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="earlyExitDate" class="form-label">Date sortie anticipé</label>
                                        <input type="date" class="form-control" id=" earlyExitDate" name="earlyExitDate">
                                    </div>

                                    <div class="col-sm-8 mt-4 mb-3 mx-auto text-white">
                                        <p>
                                            <a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Choisissez la Langue
                                            </a>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Français</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Anglais</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Allemand</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Italien</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Espagnol</label>
                                                </div>
                                                <div class="form-check form-check-inline text-dark">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Portugais</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="trailer" class="form-label">Trailer</label>
                                        <input class="form-control form-control-sm" id="trailer" name="trailer" type="file">
                                    </div>

                                    <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                        <label for="floatingTextarea2">Résumé</label>
                                        <textarea class="form-control <?= isset($formErrors['summary']) ? 'is-invalid' : '' ?> " value="<?= @$_POST['summary'] ?>" name="summary" id="floatingTextarea2" style="height: 100px"></textarea>


                                        <p class="invalid-feedback text-white fw-bold"><?= @$formErrors['summary'] ?></p>
                                    </div>

                                    <div class="mb-3 col-sm-11 mt-4 text-center">
                                        <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Publiez</button>
                                    </div>

                                </form>
                            <?php } else { ?>
                                <div class="text-center text-white mt-4 fs-5">
                                    <p>Bonjour, <?php echo $game->title . ' à bien été envoyez' ?></p>
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