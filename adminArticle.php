<?php require 'assets/template/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-4 text-start" id="neon">
            Ajoutez des articles
        </div>
    </div>
</div>

<div class="container">
    <div class="row col-8 mb-5 mt-5 shadow mx-auto">
        <div class="col-sm-12 mt-3 mb-3 text-center">
            <h3>Mes articles</h3>
        </div>

        <form action="adminArticle.php" method="POST">

            <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                <label for="formFileSm" class="form-label">Header</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file">
            </div>

            <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                <label for="exampleFormControlTextarea1" class="form-label">Corps de l'articles</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="col-sm-8 mt-3 mb-3 mx-auto text-white">
                <label for="formFileSm" class="form-label">Journal</label>
                <input class="form-control form-control-sm" id="formFileSm" type="text">
                <label for="formFileSm" class="form-label mt-2">Date de publication</label>
                <input class="form-control form-control-sm" id="formFileSm" type="date">
                <label for="formFileSm" class="form-label mt-2">Heure (facultatif)</label>
                <input class="form-control form-control-sm" id="formFileSm" type="time">
            </div>

            <div class="col-sm-8  mt-3 mb-3 mx-auto text-white">
                <label for="formFileSm" class="form-label">Liens</label>
                <input class="form-control form-control-sm" id="formFileSm" type="text" placeholder="liens vers le site">
            </div>

            <div class="mb-3 col-sm-11 mt-4 text-end">
                <button type="submit" class="btn btn-outline-dark text-white border border-white" name="send" id="send">envoyez</button>
            </div>

        </form>
    </div>
</div>


<?php require 'assets/template/footer.php'; ?>