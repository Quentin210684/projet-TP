<?php
session_start();
require 'assets/template/header.php'; ?>
<!---------------------------------------------------------Articles page------------------------------------------------------------------------------------------------------------------------------------------->

<div class="container-fluid">
    <div class="row">
        <div class="col-sm ms-md-5 mt-3 text-start" id="neon">
            Articles
        </div>

        <div class="container" id="press">
            <div class="col-sm mt-5 mb-5">
                <div class="col-sm row justify-content-center p-md-auto">
                    <a href="remarkArticl.php"></a>
                    <div class="mt-2 me-1 bg-dark card border border-3 border-outset border-dark" data-aos="flip-up" data-aos-duration="1500" style="width: 30rem;">
                        <img src="assets/img/Unpacking.jpg" class="img-fluid me-auto ms-auto" alt="...">
                        <div class="card-body text-white mb-4">
                            <h5 class="card-title">“Unpacking”, le simulateur d’emménagement qui fait un carton</h5>
                            <p class="card-text">Signé du studio indépendant australien Witch Beam, le jeu Unpacking propose de s’atteler à déballer des cartons et s’installer dans une maison.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item  bg-dark text-white">COURRIER INTERNATIONAL - PARIS</li>
                            <li class="list-group-item  bg-dark text-white">Publié le 09/11/2021</li>
                            <li class="list-group-item  bg-dark text-white">06:41</li>
                        </ul>
                        <div class="card-body d-md-flex justify-content-md-end">
                            <a href="https://www.courrierinternational.com/article/jeu-video-unpacking-le-simulateur-demmenagement-qui-fait-un-carton" class="card-link text-decoration-none text-white figure-img">En savoir plus</a>
                           <a href="addRemarkArticle.php"> <button type="button" class="btn btn-outline-light btn-sm ms-4">Un commentaire ?</button></a>
                        </div>

                    </div>


                    <div class=" mt-2 me-1 bg-dark card border border-3 border-outset border-dark" data-aos="flip-up" data-aos-duration="2000" style="width: 30rem;">
                        <img src="assets/img/stoneshard.jpg" class="img-fluid card-img-top" alt="...">
                        <div class="card-body text-white">
                            <h5 class="card-title">Un RPG brutal Roguelike qui n'est PAS pour les âmes sensibles</h5>
                            <p class="card-text">Stoneshard est un RPG brutal au tour par tour, disponible dès maintenant sur Steam en accès anticipé, qui combine un cadre fantastique en monde ouvert avec des éléments de type voyou.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item  bg-dark text-white">GAMESPACE.COM</li>
                            <li class="list-group-item  bg-dark text-white">24 février 2020</li>
                            <li class="list-group-item  bg-dark text-white">NC</li>
                        </ul>
                        <div class="card-body d-md-flex justify-content-md-end">
                            <a href="#" class="card-link text-decoration-none text-white figure-img">En savoir plus</a>
                            <a href="remarkArticl.php"> <button type="button" class="btn btn-outline-light btn-sm ms-4">Un commentaire ?</button></a>

                        </div>
                    </div>


                    <div class=" mt-2 me-1 card bg-dark border border-3 border-outset border-dark" data-aos="flip-up" data-aos-duration="2500" style="width: 30rem;">
                        <img src="assets/img/surviving.jpg" class="img-fluid card-img-top" alt="...">
                        <div class="card-body text-white">
                            <h5 class="card-title">"Surviving The Aftermath": des cataclysmes passionnants, mais pas grand-chose d'autre</h5>
                            <p class="card-text">C'est toujours passionnant lorsqu'un simulateur de gestion de colonie vous convainc de ressentir de l'empathie pour les ouvrières individuelles de la taille d'une fourmi qui vont et viennent entre vos bâtiments
                                et vos ressources...</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item  bg-dark text-white">NME</li>
                            <li class="list-group-item  bg-dark text-white">17 novembre 2021</li>
                            <li class="list-group-item  bg-dark text-white">NC</li>
                        </ul>
                        <div class="card-body d-md-flex justify-content-md-end">
                            <a href="#" class="card-link text-decoration-none text-white figure-img">En savoir plus</a>
                            <a href="remarkArticl.php"> <button type="button" class="btn btn-outline-light btn-sm ms-4">Un commentaire ?</button></a>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require 'assets/template/footer.php'; ?>