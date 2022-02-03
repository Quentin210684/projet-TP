<?php require 'assets/template/header.php'; ?>





<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3 text-start">
            <h2 class="d-flex mt-3 mb-5 align-items-center text-white "><span id="neon" class="me-2">Mes avis</span><a class="btn btn-outline-dark text-white border border-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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


            <div class="col-sm-6 mt-4  mb-4">
                <p class="text-white mt-4">Mes avis :</p>
                <table class="table">
                    <thead class="text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Avis</th>
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













    <?php require 'assets/template/footer.php'; ?>