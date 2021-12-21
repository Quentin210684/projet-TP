<?php require('assets/template/header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-4 text-start" id="neon">
            Connexion
        </div>
    </div>
</div>

<div class="container px-4">
    <div class="row gx-5">
        <div class="col-sm-4">
            <div class="p-3 mt-2 mb-4 mx-auto border-3 border border-dark animate__animated animate__fadeInLeft">
                <div class="p-3 mb-2 text-white ms-2 me-2">
                    <img src="assets/img/gif/PotionCraft gif.gif" class="img-fluid">
                </div>
                <div class="p-auto fw-bold text-white">
                    <label for="chk" aria-hidden="true" class="label">CONNECTEZ-VOUS ou <a href="registration.php" class="link-dark">Créez un compte</a></label>
                </div>
                <form action="connection.php" method="get">
                    <div class="p-3 text-white">
                        <div>
                            <label for="username"></label>
                            <input class="w-100 rounded form-control" type="text" id="username" name="username" placeholder="Utilisateur...">
                        </div>
                        <div class="password mb-5">
                            <label for="pass"></label>
                            <input class="w-100 form-control" type="password" id="pass" name="password" minlength="8" required placeholder="Mot de passe...">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input rounded" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">Se souvenir de moi
                            </label>
                        </div>
                        <div class="ms-1 mb-4">
                            <a href="mot de passe oublié ?" class="link-dark">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <button class="btn btn-primary"  type="submit">Connexion</button>
                </div>
            </div>

        </div>
        <div class="col-sm-8">
            <div class="p-3 mt-4 mb-5 mx-auto">
                <div class="col-sm-12">
                    <div class="p-3 mb-3 text-center border-3 border border-dark colorLogo2">
                        <h2 class="image-clignote colorLogo">Note d'information</h2>
                    </div>
                    <div class="col-sm-12">
                        <div class="p-3 text-white border-3 border border-dark">
                            <ul>
                                <li>
                                    <p>Afin d’être susceptible d’être sélectionné pour participer à un Game test et ainsi recevoir une clé produit.
                                        Un internaute doit remplir les conditions suivantes : avoir la qualité de Membre régulièrement inscrit sur le Site.
                                </li>
                                </p>
                                <li>
                                    <p>Avoir renseigné sur le Site, dans la rubrique « Informations du compte », l’ensemble des informations permettant l’envoi du produit objet du test produit : nom, prénom, adresse mail.
                                </li>
                                </p>
                                <li>
                                    <p>Avoir rédigé dans les 90 jours précédant le début de la sélection au test produit au moins trois (3) avis sur l’un des jeux présentés sur le Site.
                                </li>
                                </p>
                                <li>
                                    <p>Ne pas avoir été sélectionné en tant que testeur plus de deux (2) fois durant les 90 derniers jours précédant le début de la sélection en cours.
                                </li>
                                </p>
                                <li>
                                    <p>Pour évaluer la qualité de ces avis, l'éditeur du Site prend notamment en compte le niveau de détail de chaque
                                        avis produit, la pertinence du propos vis-à-vis d'une audience composée de joueurs en recherche d'informations utiles, l'orthographe et la syntaxe.
                                </li>
                                </p>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php require('assets/template/footer.php'); ?>