<?php require 'models/gamesModel.php'; ?>
<?php require 'controllers/gamesListAdminController.php'; ?>
<?php require '../assets/template/header.php'; ?>



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
            <h2 id="neon" class="text-start mt-3 mb-5">Liste de jeux</h2>
            <div class="col-sm-12">
                <div class="container-fluid">
                    <div class="row">

                   
                        <div class="col-sm-4">
                            <img src="assets/img/a découvrir 1.jpg" class="gameSize img-fluid figure-img figure-img" id="discovery">
                        </div>
                        <div class="col-sm-4">
                            <img src="assets/img/hollow knight.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4">
                            <img src="assets/img/hades.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/nimbatus.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/ruined.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/noita.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/world.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/two crown.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/security.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/house builder.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/gas station.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/wartales.jpg" class="gameSize img-fluid figure-img">
                        </div>



                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/Wallpapers engine.png" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/unfinished.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/dead.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/celeste.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 3.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/spirit.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/ark genesis.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/terraria.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/trine.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/space haven.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/nine.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/luxury.jpg" class="gameSize img-fluid figure-img">
                        </div>



                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/tabs.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/aimlab.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/steel.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/outer.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/gunfire.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/disco.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/slay.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/overcooked.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/trine2.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/melvor.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/zomboid.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/oxygen.jpg" class="gameSize img-fluid figure-img">
                        </div>




                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/blade.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/northgard.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 2 dd.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 17 Undying.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 1logic.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 15command.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 11stoneshard.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 13divinity.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 14surviving.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 10spellcaster.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 4.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/page jeux 8.jpg" class="gameSize img-fluid figure-img">
                        </div>



                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/rogue.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/kenshi.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/don't starve.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/tribes.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/project.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/kingdom.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/shakes.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/islanders.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/little.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/the forgotten.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/a découvrir 4.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/bones.jpg" class="gameSize img-fluid figure-img">
                        </div>


                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/battle.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/eurotruck.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/lens.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/firestone.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/town.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/garden.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/hydroneer.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/paper.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/shovel.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/izombie.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/carrion.jpg" class="gameSize img-fluid figure-img">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img src="assets/img/baba.jpg" class="gameSize img-fluid figure-img">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>











<!-- <div class="accordion accordion-flush ms-2 me-2 mt-5 mb-2" id="accordionFlush">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Gestion du site
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
            <div class="accordion-body modal-body">
                
            <div class="container">
                    <div class="row col-auto mb-5 mt-5">

                        <div class="col-sm-4 shadow">
                            <div class="col-sm-12 mt-3 mb-3 text-center">
                                <h3>Mes Articles</h3>
                            </div>
                            <form action="admin.php" method="POST">

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="formFileSm" class="form-label">Header</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="FormControlTextarea1" class="form-label">Corps de l'articles</label>
                                    <textarea class="form-control" id="FormControlTextarea1" rows="3"></textarea>
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="formFileSm" class="form-label">Journal</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="text">
                                    <label for="formFileSm" class="form-label mt-2">Date de publication</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="date">
                                    <label for="formFileSm" class="form-label mt-2">Heure (facultatif)</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="time">
                                </div>

                                <div class="col-sm-8  mt-3 mb-3 mx-auto text-white">
                                    <label for="formFileSm" class="form-label">Liens</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="text" placeholder="liens vers le site">
                                </div>

                                <div class="mb-3 col-sm-11 mt-4 text-center">
                                    <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Publiez</button>
                                </div>

                            </form>
                        </div>

                        <div class="col-sm-4 shadow">
                            <div class="col-sm-12 mt-3 mb-3 text-center">
                                <h3>Mes Jeux</h3>
                            </div>

                            <form action="admin.php" method="POST">

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="formFileSm" class="form-label">Header</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Titre</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Développeur</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Genre</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Date de parution</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Date sortie anticipé</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Langue</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Resumé</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="formFileSm" class="form-label">Trailer</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Evaluation</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="exampleFormControlTextarea1" class="form-label">Descriptif du mods</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <div class="mb-3 col-sm-11 mt-4 text-center">
                                    <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Publiez</button>
                                </div>

                            </form>
                        </div>

                        <div class="col-sm-4 shadow">
                            <div class="col-sm-12 mt-3 mb-3 text-center">
                                <h3>Mes Mods</h3>
                            </div>
                            <form action="admin.php" method="POST">

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="formFileSm" class="form-label">Header</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="lastName" class="form-label">Titre</label>
                                    <input type="text" class="form-control" id=" title" name="title">
                                </div>

                                <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                                    <label for="exampleFormControlTextarea1" class="form-label">Descriptif du mods</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <div class="mb-3 col-sm-11 mt-4 text-center">
                                    <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">Publiez</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-item ms-2 me-2 mb-5">
    <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Gestion des membres
        </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush">
        <div class="accordion-body">En attente</div>
    </div>
</div> -->






















<?php require '../assets/template/footer.php'; ?>