<?php require('assets/template/header.php'); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md ms-md-5 mt-4 text-start" id="neon">
            Contact
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto mb-5 mt-3 border-3 border border-dark colorLogo2">
            
<!----------------------------------------- formulaire de contact et regex ------------------>


            <form action="" method="$_POST">
                <div class="row g-3 mt-3 text-center text-dark">
                    <h2 class="text-white">Contact</h2>
                    <div class="col-md-6 mx-auto">
                        <div class="col-ms-6">
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" name="user" placeholder="Utilisateur" id="floatingTextarea">
                                <label for="floatingTextarea">Utilisateur</label>
                            </div>

                            <div class="form-floating mb-5">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput">Adresse e-mail</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" name="message" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Votre message</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <button class="btn btn-primary" type="submit">Soumettre votre demande</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

<?php require('assets/template/footer.php'); ?>