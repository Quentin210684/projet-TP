<?php require 'assets/template/header.php'; ?>
<!-------------------------------------------------------Page centrale Mods------------------------------------------->
<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-3 text-start" id="neon">
            MODS
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="size col-md-4 mt-3 fs-5 text-white text-center">
            Créer, trouver et télécharger des mods pour votre jeu.
        </div>
        <div class="col-md-8 mt-2 text-white">
            <nav class="navbar navbar-transparent bg-transparent">
                <div class="container-fluid justify-content-end me-5 mt-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Chercher un mod..." aria-label="Search">
                        <button class="btn btn-outline-dark border border-white text-start text-white" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-3 mb-5">
                <div class="row">
                    <div class="col-sm-3 mt-3">
                        <div class="card animate__animated animate__backInLeft border-3 border-outset border-dark" id="slide">
                            <a href="">
                                <img src="assets/img/modimage1.png" class="img-fluid card-img-top " alt="...">
                            </a>
                            <img src="assets/img/page jeux 2 dd.jpg" class="image-fluid">
                            <p class="card-text text-center colorLogo2"><small class="text-white">3518 objets</small></p>

                        </div>
                    </div>
                    <div class="col-sm-3 mt-3">
                        <div class="card animate__animated animate__backInDown border-3 border-outset border-dark" id="slide">
                            <a href="">
                                <img src="assets/img/modimage2.png" class="card-img-top img-fluid" alt="...">
                            </a>
                            <img src="assets/img/page jeux 13divinity.jpg" class="image-fluid">
                            <p class="card-text text-center colorLogo2"><small class="text-white">21 objets</small></p>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-3">
                        <div class="card animate__animated animate__backInUp border-3 border-outset border-dark" id="slide">
                            <a href="">
                                <img src="assets/img/modimage3.png" class="card-img-top img-fluid" alt="...">
                            </a>
                            <img src="assets/img/page jeux 15command.jpg" class="image-fluid">
                            <p class="card-text text-center colorLogo2"><small class="text-white">11561 objets</small></p>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-3">
                        <div class="card animate__animated animate__backInRight border-3 border-outset border-dark" id="slide">
                            <a href="">
                                <img src="assets/img/modimage4.png" class="card-img-top img-fluid" alt="...">
                            </a>
                            <img src="assets/img/page jeux 16.jpg." class="image-fluid">
                            <p class="card-text text-center colorLogo2"><small class="text-white">61 objets</small></p>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mt-2">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-11 mb-5 text-end">
                <a href="formMods.php"><button class="btn btn-outline-dark text-white border border-white" type="button" id="button search">Soumettez votre mod</button></a> 
            </div>
        </div>
    </div>
</div>

<?php require 'assets/template/footer.php'; ?>