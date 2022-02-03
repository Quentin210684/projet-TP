<?php require 'assets/template/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 mt-3 mb-3 mx-auto">
            <div class="col-sm-12 mt-2 mx-auto border-3 border border-dark">
                <h3 class="fw-bolder text-dark text-center">Fiche de jeux</h3>
                <p class="size text-white fs-5 ms-2"><i class="fas fa-pencil-alt text-dark"></i> Développeur : niceplay games</p>
                <p class="size fs-5 text-white ms-2"><i class="far fa-lightbulb text-dark"></i> Genre : Indépendant, Simulation, Accès anticipé</p>
                <p class="size text-white fs-5 ms-2"><i class="far fa-calendar-alt text-dark"></i> Date de parution : 21 sept. 2021</p>
                <p class="size fs-5 text-white ms-2"><i class="fas fa-external-link-alt text-dark"></i> Date de sortie en accès anticipé : 21 sept. 2021</p>
                <div class="d-flex">
                    <p class="size fs-5 text-white ms-2"><img src="assets/img/icone steam.png"><a href="https://store.steampowered.com/app/1210320/Potion_Craft_Alchemist_Simulator/" class="text-decoration-none text-white">Store</a></p>
                </div>
            </div>
            <div class="col-sm-12 mt-4 border-3 border border-dark" id="gameWindows">
                <h3 class="fw-bolder text-dark text-center">Langues</h3>
                <table class="table text-dark">
                    <thead class="text-white">
                        <tr>
                            <th scope="col-sm">#</th>
                            <th scope="col-sm">Interface</th>
                            <th scope="col-sm">Audio</th>
                            <th scope="col-sm">Sous-titre</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        <tr>
                            <th scope="row">Français</th>
                            <td><i class="fas fa-times ms-3"></i></td>
                            <td><i class="fas fa-times ms-3"></i></td>
                            <td><i class="fas fa-times ms-3"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Anglais</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Russe</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Italien</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Allemand</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Espagnol-Espagne</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Tchèque</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Japonais</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Coréen</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Polonais</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Portugais du Brésil</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Thaï</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Turc</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Chinois simplifié</th>
                            <td><i class="fas fa-check ms-3"></i></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 mt-4 mb-3 border-3 border border-dark">
                <h3 class="fw-bolder text-dark text-center">Résumé</h3>
                <p class="text-white ms-3">Potion Craft est un simulateur d'alchimie dans lequel vous interagissez physiquement avec vos outils et ingrédients pour concocter des potions. Vous contrôlez votre échoppe : inventez de nouvelles recettes, attirez des clients et expérimentez à l'envi. N'oubliez pas : toute la cité compte sur vous.</p>
            </div>
        </div>

        <div class="col-sm-7 mt-5 text-white">
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/tV5LXRZqQ9g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <button type="button" class="btn btn-primary text-center mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Donnez votre avis
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <form action="addOpinionuser.php" method="POST">

                                <div class="col-sm-12 mt-3 mb-4">
                                    <h3>Evaluation</h3>
                                    <h5>Titre du jeux</h5>
                                </div>
                                <div class="row mx-auto text-center">
                                    <div class="col-sm-6 mb-3">
                                        <p>Vous avez jouer <span>"nombre d'heure"</span></p>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <p>Recommanderiez vous ce jeu ?</i></p>
                                    </div>
                                    <div class="col-sm-12 mb-2 ms-2">
                                        <div class="rating">

                                            <a href="#5" title="Give 5 stars">☆</a>

                                            <a href="#4" title="Give 4 stars">☆</a>

                                            <a href="#3" title="Give 3 stars">☆</a>

                                            <a href="#2" title="Give 2 stars">☆</a>

                                            <a href="#1" title="Give 1 star">☆</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4 mx-auto ">
                                    <p>Veuillez décrire ce que vous avez aimé ou n'avez pas aimé à propos de ce jeu.
                                        Veuillez également indiquer si vous le recommandez à d'autres utilisateurs.
                                        Veillez à garder un langage correct et à respecter les règles du site. Votre recommandation ne sera pas publiées s'il
                                        n'y a pas de description.</p>
                                    </p>
                                </div>
                                <div class="col-sm-12 mb-4 mt-4">
                                    <label for="floatingTextarea2">Votre message</label>
                                    <textarea class="form-control" placeholder="Laissez un message..." name="message" id="floatingTextarea2" style="height: 100px"></textarea>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mb-3">
                                    <button class="btn btn-outline-dark text-white border border-white" type="button">Confirmer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-auto mt-3 border-3 border-top border-dark shadow"">
                <h3 class=" fw-bolder text-dark text-center">-Evaluations-</h3>
       

    </div>
</div>

<?php require 'assets/template/footer.php'; ?>