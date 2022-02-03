<?php require 'models/usersModel.php'; ?>
<?php require 'controllers/usersListAdminController.php'; ?>
<?php require '../assets/template/header.php'; ?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2"> Liste des utilisateurs</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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


            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table text-white text-center">
                                <thead>
                                    <tr>
                                        <th scope="col-sm-2">#</th>
                                        <th scope="col-sm-2">UTILISATEUR</th>
                                        <th scope="col-sm-2">EMAIL</th>
                                        <th scope="col-sm-2">ROLE</th>
                                        <th scope="col-sm-4">SUPPRIMER</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usersList as $userDetails) { ?>
                                        <tr>
                                            <th scope="row"><?= $userDetails->id ?></th>
                                            <td><?= $userDetails->name ?></td>
                                            <td><?= $userDetails->email ?></td>
                                            <td><?php $userDetails->id_roles ?></td>
                                            <td>
                                                <form action="admin-liste-des-utilisateurs" method="POST"><input type="hidden" name="deleteUser" value="<?= $userDetails->id ?>"><button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer un utilisateur"><i class="far fa-times-circle"></i></button></form>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div>
            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
        </div>
    </div>
    <div class="col-sm-2 border">
        UTILISATEUR
    </div>
    <div class="col-sm-2 border">
        EMAIL
    </div>
    <div class="col-sm-1 border">
        ACTIF
    </div>
    <div class="col-sm-1 border">
        ROLES
    </div>
    <div class="col-sm-2 border">
        MEMBRE DEPUIS
    </div>
    <div class="col-sm-3 border">
        ACTION
    </div>
</div>
<div class=" verticalAlign row text-center text-white">
    <div class="col-sm-1 border">
        <div>
            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
        </div>
    </div>
    <div class="col-sm-2 border">
        ...
    </div>
    <div class="col-sm-1 border">
        ..
    </div>
    <div class="col-sm-1 border">
        ..
    </div>
    <div class="col-sm-2 border">
        ..
    </div>
    <div class="col-sm-2 border">
        ...
    </div>
    <div class="col-sm-3 border">
        <p><a href="#" class=" text-decoration-none">Modifier</a>/<a href="#" class=" text-decoration-none">Annuler le compte</a></p>
    </div> -->











<?php require '../assets/template/footer.php'; ?>