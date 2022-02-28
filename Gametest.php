<?php 
session_start();
require 'assets/template/header.php'; ?>
<!-------------------------------------------------------Page centrale Game test------------------------------------------->
<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-4 text-start" id="neon">
            GAME TEST DU MOIS
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-auto my-5" id="gametest">
            <img src="assets/img/undying1.webp" class="img-fluid animate__animated animate__fadeInLeft mt-5" alt="undying" id="undying" />
        </div>
        <div class="col-sm-5 mb-3 fs-5 text-white text-center align-self-center">
            Validez le quiz afin de participer au test !
            <div class="col-sm mt-4">

                <form action="" method="post">
                    <div class="col-sm-12 mt-5 mb-2 bg-dark border text-center border pt-2">
                        <p>Quelle est la date de sorti de undying ?</p>
                    </div>
                    <div class="col-sm-12 d-flex ms-3">
                        <div class="col-sm-5">
                            <input type="checkbox" name="response1" value="sortie"> 19 oct. 2021
                        </div>
                        <div class="col-sm-6">
                            <input type="checkbox" name="response2" value="sortie2"> 18 juin. 2020
                        </div>
                    </div>
                    <div class="col-sm-12 bg-dark mt-4 mb-4 border pt-2">
                        <p>Quel est le développeur du jeu ?</p>
                    </div>
                    <div class="col-sm-12 d-flex ms-3">
                        <div class="col-sm-5">
                            <input type="checkbox" name="response1" value="déveloper"> Vanimals
                        </div>
                        <div class="col-sm-6">
                            <input type="checkbox" name="response2" value="déveloper2"> Touch Arcade
                        </div>
                    </div>
                    <div class="col-sm-12 bg-dark mt-4 mb-4 border pt-2">
                        <p>Le jeu a-t-il gagné des récompenses en 2021 ?</p>
                    </div>
                    <div class="col-sm-12 d-flex ms-3">
                        <div class="col-sm-5">
                            <input type="checkbox" name="response1" value="reward"> Oui
                        </div>
                        <div class="col-sm-6">
                            <input type="checkbox" name="response2" value="reward2"> Non
                        </div>
                    </div>
                    <div class="col-sm-12 bg-dark mt-4 mb-4 border pt-2">
                        <p>Le jeu ce joue à la première personne.</p>
                    </div>
                    <div class="col-sm-12 d-flex ms-3">
                        <div class="col-sm-5">
                            <input type="checkbox" name="response1" value="gender"> Vrai
                        </div>
                        <div class="col-sm-6">
                            <input type="checkbox" name="response2" value="gender2"> Faux
                        </div>
                    </div>
                    <div class="col-sm-12 bg-dark mt-4 mb-4 border pt-2">
                        <p>Quel est le genre du jeu ?</p>
                    </div>
                    <div class="col-sm-12 d-flex ms-3">
                        <div class="col-sm-5">
                            <input type="checkbox" name="response1" value="gender"> Arcade
                        </div>
                        <div class="col-sm-6">
                            <input type="checkbox" name="response2" value="gender2"> Survie
                        </div>
                    </div>
                    <div class="col-sm-12 mt-4 mb-4 text-end">
                        <button class="btn btn-outline-dark text-white border border-white" type="submit">Envoyez</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php require 'assets/template/footer.php'; ?>