<?php
session_start();
require_once 'controllers\addReviewController.php';
require 'assets/template/header.php'; ?>


<!-------------------------------------------------------Page centrale Avis------------------------------------------->

<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-4 text-start" id="neon">
            REDIGER VOTRE AVIS
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-5 mb-5 fs-5 text-white text-center">
            <p>Chercher un jeu ou un article pour y laisser un avis</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4 mb-4">
            <select name="orderby" id="orderby" class="form-control mb-3">
                <option value="title">Jeux</option>
                <option value="title">Mod</option>
                <option value="title">Article</option>
            </select>
            <input type="text" class="form-control" id="search" placeholder="Laissez votre avis sur un jeu, un article ou un mod" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div id="gameOpinionDiv" class="mb-4 d-md-flex d-grid gap-2 justify-content-center"></div>
        </div>
    </div>
</div>




<?php require 'assets/template/footer.php'; ?>