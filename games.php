<?php require 'assets/template/header.php'; ?>
<!-------------------------------------------------------Page centrale jeux------------------------------------------->
<!--Finir de completez les alt des images-->


<!---------------------------------------------------------------Liste deroulante ------------------------------------------------------>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 mt-2 p-3 mb-3 border-3 border-end border-dark">
            <h2 id="neon" class="border-3 border-bottom border-dark mb-5">JEUX</h2>
            <div class=" size col-sm fs-5 text-white">
                <label for="genre-select">Type</label>
            </div>
            <div class="col-sm mt-3">
                <select class="btn btn-outline-dark dropdown-toggle border border-white text-start text-white" name="genres" id="genre-select">
                    <option value="">--Tous--</option>
                    <option value="action">Action</option>
                    <option value="adresse">Adresse</option>
                    <option value="aventure">aventure</option>
                    <option value="beat'em all">beat'em all</option>
                    <option value="city-builder">city-builder</option>
                    <option value="combat">combat</option>
                    <option value="course">course</option>
                    <option value="craft">craft</option>
                    <option value="FPS">FPS</option>
                    <option value="gestion">gestion</option>
                    <option value="hack'n slash">hack'n slash</option>
                    <option value="RPG">RPG</option>
                    <option value="narratif">narratif</option>
                    <option value="plateforme">plateforme</option>
                    <option value="reflexion">reflexion</option>
                    <option value="sandbox">sandbox</option>
                    <option value="simulation">simulation</option>
                    <option value="strategie">strategie</option>
                    <option value="survie">survie</option>
                    <option value="horreur">horreur</option>

                </select>
            </div>
            <div class=" size col-sm fs-5 mt-5 text-white">
                <label for="genre-select">Graphisme</label>
            </div>
            <div class="col-sm mt-3">
                <select class="btn btn-outline-dark dropdown-toggle border border-white text-start text-white" name="genres" id="genre-select">
                    <option value="">--Tous--</option>
                    <option value="2D">2D</option>
                    <option value="3D">3D</option>
                    <option value="Pixel art">Pixel art</option>
                </select>
            </div>
            <div class=" size col-sm fs-5 mt-5 text-white">
                <label for="genre-select">Support</label>
            </div>
            <div class="col-sm mt-3">
                <select class="btn btn-outline-dark dropdown-toggle border border-white text-start text-white" name="genres" id="genre-select">
                    <option value="">--Tous--</option>
                    <option value="windows">Windows</option>
                    <option value="mac">Mac</option>
                </select>
            </div>
            <div class=" size col-sm fs-5 mt-5 d-grid">
                <button class="btn btn-outline-dark text-white border border-white" type="button" id="button search">Rechercher</button>
            </div>
        </div>

        <!-----------------------------------------------Changer les jeux dans la page------------------------------------------------------------------------------------>

        <div class="col-sm-9 mt-5 ms-md-5 mb-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm mt-2 ms-2 mb-2 animate__animated animate__zoomInDown">
                        <figure class="figure border border-3 border-outset border-dark">
                            <img src="assets/img/page jeux 1logic.jpg" id="logic" class="img-fluid card-img2 figure-img rounded mb-0" alt="...">
                            <div class="d-flex align-items-center colorLogo2 fw-bold">
                                <p class="size figure-caption mt-2 mb-1 ms-1 fs-6 col-sm me-md-2"><a href="logicworldgamepage.php" class="text-decoration-none text-white">Logic World</a></p>
                                <p class="col-sm mt-1 mb-1 text-end "><img src="assets/img/logo windows reduit.png"><img src="assets/img/logo mac os reduit.png"></p>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm mt-2 ms-2 mb-2 animate__animated animate__zoomInDown">
                        <figure class="figure border border-3 border-outset border-dark" >
                            <img src="assets/img/page jeux 2 dd.jpg" id="dark" class=" img-fluid card-img2 figure-img rounded mb-0 " alt="...">
                            <div class="d-flex align-items-center colorLogo2 fw-bold">
                                <p class="size figure-caption mt-2 mb-1 ms-1 fs-6 col-sm me-md-2"><a href="Darkest Dungeon" class="text-decoration-none text-white">Darkest Dungeon</a></p>
                                <p class="col-sm mt-1 mb-1 text-end "><img src="assets/img/logo windows reduit.png"><img src="assets/img/logo mac os reduit.png"></p>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm mt-2 ms-2 mb-2 animate__animated animate__zoomInDown">
                        <figure class="figure border border-3 border-outset border-dark">
                            <img src="assets/img/page jeux 3.jpg" id="graveyard" class=" img-fluid card-img3 figure-img rounded mb-0" alt="...">
                            <div class="d-flex align-items-center colorLogo2 fw-bold">
                                <p class="size figure-caption mt-2 mb-1 ms-1 fs-6 col-sm me-md-2"><a href="Graveyard Keeper" class="text-decoration-none text-white">Graveyard Keeper</a></p>
                                <p class="col-sm mt-1 mb-1 text-end "><img src="assets/img/logo windows reduit.png"><img src="assets/img/logo mac os reduit.png"></p>
                            </div>
                        </figure>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm mt-2 ms-1 mb-2 animate__animated animate__zoomInDown">
                                <figure class="figure border border-3 border-outset border-dark">
                                    <img src="assets/img/page jeux 4.jpg" id="rebel" class="img-fluid card-img3 figure-img rounded mb-0" alt="...">
                                    <div class="d-flex align-items-center colorLogo2 fw-bold">
                                        <p class="size figure-caption mt-2 mb-1 ms-1 fs-6 col-sm me-md-2"><a href="Rebel Inc. Escalation" class="text-decoration-none text-white">Rebel Inc. Escalation</a></p>
                                        <p class="col-sm mt-1 mb-1 text-end "><img src="assets/img/logo windows reduit.png"><img src="assets/img/logo mac os reduit.png"></p>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-sm mt-2 ms-1 mb-2 animate__animated animate__zoomInDown">
                                <figure class="figure border border-3 border-outset border-dark">
                                    <img src="assets/img/page jeux 5.jpg" id="ruined" class="img-fluid card-img2 figure-img rounded mb-0" alt="...">
                                    <div class="d-flex align-items-center colorLogo2 fw-bold">
                                        <p class="size figure-caption mt-2 mb-1 ms-1 fs-6 col-sm me-md-2"><a href="Ruined King" class="text-decoration-none text-white">Ruined King</a></p>
                                        <p class="col-sm mt-1 mb-1 text-end "><img src="assets/img/logo windows reduit.png"></p>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-sm mt-2 ms-1 mb-2 animate__animated animate__zoomInDown">
                                <figure class="figure border border-3 border-outset border-dark">
                                    <img src="assets/img/page jeux 6.jpg" id="dysm" class="card-img2 figure-img img-fluid rounded mb-0" alt="...">
                                    <div class="d-flex align-items-center colorLogo2 fw-bold">
                                        <p class="size figure-caption mt-2 mb-1 ms-1 fs-6 col-sm me-md-2"><a href="Dysmantle" class="text-decoration-none text-white">Dysmantle</a></p>
                                        <p class="col-sm mt-1 mb-1 text-end "><img src="assets/img/logo windows reduit.png"><img src="assets/img/logo mac os reduit.png"></p>

                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center" id="pagination"">
                    <li class=" page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="games.php">1</a></li>
                    <li class="page-item"><a class="page-link" href="gamespage2.php">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>


        <?php require 'assets/template/footer.php'; ?>