<?php require 'assets/template/header.php'; ?>
<!--CARROUSEL-->

<div class="container">
    <div class="row">
        <div class="col-sm-7 lg-3 mt-2">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/Action carroussel maquette.jpg" class="d-block w-100" class="img-fluid" alt="image1">
                        <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                            <a href="Prochainement" class="news2">Prochainement</a>
                            <p>Bright Memory: Infinite est un tout nouveau jeu fulgurant mélangeant FPS et action.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/Action carroussel maquette 2.jpg" class="d-block w-100" class="img-fluid" alt="image2">
                        <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                            <a href="Prochainement" class="news2">Prochainement</a>
                            <p>Undungeon est un magnifique jeu d'action/RPG sublimé par des combats intenses en temps réel.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/Action carroussel maquette3.jpg" class="d-block w-100" class="img-fluid" alt="image3">
                        <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                            <a href="Prochainement" class="news2">Prochainement</a>
                            <p>Hollow Knight: Silksong est un jeu vidéo indépendant de type metroidvania.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-sm mt-2 border bg-light   shadow">
            <div id="selection">La sélection du moment</div>
            <div class="clearfix mt-4">
                <img src="assets/img/a découvrir 1.jpg" class="col-md-8 float-md-end mb-3 ms-md-3 img-fluid" alt="image4">
                <p>Dans ce city-builder inspiré de « Banished », vous dirigerez un peuple à la recherche de son nouveau foyer. Terraformez le paysage, gérez des matières premières rares, plantez des cultures, collectez des ressources et développez des
                    routes commerciales pour bâtir une ville unique et animée. </p>
                <a href="selectionmoment.php" class="text-decoration-none">En savoir plus</a>
            </div>
        </div>
    </div>
</div>

<!--A découvrir----------------------------------------------------->

<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-4 text-center text-white">
            <h5 id="neon">- A découvrir -</h5>
        </div>
    </div>
</div>


<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->



<div class="container">
    <div class="row row-cols-sm row-cols-md-11 g-4 mt-3 text-center">
        <div class="col-sm">
            <div class="card h-75 border-3 border-outset border-dark animate__animated animate__zoomIn">
                <img src="assets/img/potion image.jpg" class="card-img-top card-img img-fluid" alt="decouverte1"  id="potion">
                <div class="card-body overflow-auto colorLogo2">

                    <!--------------Mettre à jour les découverte---------------------------------------->
                    <h5>
                        <a href="game.php" class="news colorLogo">Potion Craft</a>
                    </h5>
                    <p class="card-text text-white">Potion Craft est un simulateur d'alchimie dans lequel vous interagissez physiquement avec vos outils et ingrédients pour concocter des potions</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card h-75 border-3 border-outset border-dark animate__animated animate__zoomIn">
                <img src="assets/img/a découvrir 2.jpg" class="card-img-top card-img img-fluid" alt="decouverte2" id="unpack">
                <div class="card-body overflow-auto colorLogo2">

                    <!--------------Mettre à jour les découverte---------------------------------------->

                    <h5>
                        <a href="Unpacking" class="news colorLogo">Unpacking</a>
                    </h5>
                    <p class="card-text text-white">Unpacking est un jeu de puzzle zen sur l'expérience familière de sortir ses affaires de cartons et de les placer dans une nouvelle maison.</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card h-75 border-3 border-outset border-dark animate__animated animate__zoomIn">
                <img src="assets/img/a découvrir 3.jpg" class="card-img-top card-img img-fluid" alt="decouverte3" id="despot">
                <div class="card-body overflow-auto colorLogo2">

                    <!--------------Mettre à jour les découverte---------------------------------------->

                    <h5>
                        <a href="Despot's game" class="news colorLogo">Despot's game</a>
                    </h5>
                    <p class="card-text text-white">Savant mélange de tactiques rogue-like et de batailles explosives</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card h-75 border-3 border-outset border-dark animate__animated animate__zoomIn">
                <img src="assets/img/a découvrir 4.jpg" class="card-img-top card-img img-fluid" alt="decouverte4" id="tavern" >
                <div class="card-body overflow-auto colorLogo2 h-25">

                    <!--------------Mettre à jour les découverte---------------------------------------->

                    <h5>
                        <a href="Tavern Master" class="news colorLogo">Tavern Master</a>
                    </h5>
                    <p class="card-text text-white">Tavern Master consiste à gérer une taverne médiévale. Vous commencez avec une toute petite pièce, quelques bancs et tables, et vous progressez jusqu'à devenir une grande taverne prospère avec une cuisine, des chambres pour les
                        clients, un groupe de loyaux employés et bien plus encore</p>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require 'assets/template/footer.php'; ?>