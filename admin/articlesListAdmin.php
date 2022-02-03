<?php require 'models/gamesModel.php'; ?>
<?php require 'models/articlesModel.php'; ?>
<?php require 'controllers/articlesListAdminController.php'; ?>
<?php require '../assets/template/header.php'; ?>





<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Liste des articles</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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
                <div class="col-sm-12">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Contenu</th>
                                        <th scope="col">Nom du journal</th>
                                        <th scope="col">Date de publication</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($articlesList as $articlesDetails) { ?>
                                        <tr class="text-center text-white">
                                            <th class="align-middle" scope="row"><?= $articlesDetails->id ?></th>
                                            <td class="align-middle"><img src="assets/img/<?= $articlesDetails->picture ?>" class="imgSize"></td>
                                            <td class="align-middle"><?= $articlesDetails->title ?></td>
                                            <td class="align-middle"><?= $articlesDetails->content ?></td>
                                            <td class="align-middle"><?= $articlesDetails->headline ?></td>
                                            <td class="align-middle"><?= $articlesDetails->publicationDate ?></td>
                                            <td class="align-middle">
                                                <a href="admin-ajouter-un-article" class="btn btn-primary" title="Ajouter articles"><i class="fas fa-plus"></i></a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="admin-modification-article_<?= $articlesDetails->id ?>" class="btn btn-warning" title="Modifier articles"><i class="fas fa-user-edit"></i></a>
                                            </td>
                                            <td class="align-middle">
                                                <form action="liste-admin-articles" method="POST"><input type="hidden" name="deleteArticle" value="<?= $articlesDetails->id ?>"><button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer articles"><i class="far fa-times-circle"></i></button></form>
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







<?php require '../assets/template/footer.php'; ?>