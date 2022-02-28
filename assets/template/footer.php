</section>
<div class="container-fluid colorLogo2">
    <div class="row">
        <div class="col-sm p text-end">
            <a href="https://www.youtube.com/"><img src="assets/img/YouTube.png"></a>
            <a href="https://store.steampowered.com/?l=french"><img src="assets/img/icone steam.png"></a>
        </div>
    </div>



    <footer class="container-fluid m-0 pb-0 colorLogo2">
        <div class="row mb-3">
            <div class="col-sm-2 p-2 text-center">
                <a href="Plan du site" class="text-decoration-none text-white" type="text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Plan du site
                </a>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content text-start">
                            <div class="modal-header colorLogo2">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Plan de site</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h3><a href="accueil" class="plan text-white text-decoration-none">Accueil</a></h3>
                                            <ul>
                                                <li><a href="jeux" class="plan text-white text-decoration-none">Jeux</a></li>
                                                <li><a href="mods" class="plan text-white text-decoration-none">Mods</a></li>
                                                <li><a href="article-de-presse" class="plan text-white text-decoration-none">Articles</a></li>
                                                <li><a href="test" class="plan text-white text-decoration-none">Game test</a></li>
                                                <li><a href="rediger-un-avis" class="plan text-white text-decoration-none">Rédiger un avis</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h3><a href="#" class="plan text-white text-decoration-none">Votre compte</a></h3>
                                            <ul>
                                                <li><a href="connexion" class="plan text-white text-decoration-none">Connexion</a></li>
                                                <li><a href="inscription" class="plan text-white text-decoration-none">Inscription</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h3><a href="#" class="plan text-white text-decoration-none">Nous contacter</a></h3>
                                            <ul>
                                                <li><a href="Contact" class="plan text-white text-decoration-none">Contact</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h3><a href="Pages" class="plan text-white text-decoration-none">Pages</a></h3>
                                            <ul>
                                                <li><a href="Condition d'utilisation" class="plan text-white text-decoration-none">Condition d'utilisation</a></li>
                                                <li><a href="mentionsLegales.php" class="plan text-white text-decoration-none">Mentions légales</a></li>
                                                <li><a href="Politique concernant les cookies" class="plan text-white text-decoration-none">Politique concernant les cookies</a></li>
                                                <li><a href="Politique de confidentialité" class="plan text-white text-decoration-none">Politique de confidentialité</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer colorLogo2">
                                <button type="button" class="btn btn-outline-dark text-white border border-white" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm p-2 text-center">
                <a href="Condition d'utilisation" class="text-decoration-none text-white">Condition d'utilisation</a>
            </div>
            <div class="col-sm p-2 text-center">
                <a href="mentionsLegales.php" class="text-decoration-none text-white">Mentions légales</a>
            </div>
            <div class="col-sm-3 p-2 text-center">
                <a href="Politique concernant les cookies" class="text-decoration-none text-white">Politique concernant les cookies</a>
            </div>
            <div class="col-sm-2 p-2 text-end me-5 text-center">
                <a href="Politique de confidentialité" class="text-decoration-none text-white">Politique de confidentialité</a>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm p-1 text-center">
                <p class="text-center text-white">GameScreening©2022 Copyright.Tous droits réservés.</p>
            </div>
        </div>
    </footer>






    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.8/js/froala_editor.pkgd.min.js'></script>
    <script>
        var editor = new FroalaEditor('#floatingTextarea2')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0af4ce9358.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>








    <!-- $_SERVER va permettre de faire la correspondance entre la page PHP et la ou se trouve le JS  -->
    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/registration.php') { ?>
        <script src="assets/js/registration.js"></script>
    <?php } ?>
    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/gameTest.php') { ?>
        <script src="assets/js/gametest.js"></script>
    <?php } ?>

    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/pressArticlesList.php') { ?>
        <script src="assets/js/script.js"></script>
    <?php } ?>

    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/index.php') { ?>
        <script src="assets/js/index.js"></script>
    <?php } ?>

    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/admin/dashboardAdmin.php') { ?>
        <script src="assets/js/admin.js"></script>
    <?php } ?>
    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/gamesList.php') { ?>
        <script src="assets/js/games.js"></script>
    <?php } ?>
    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/admin/gamesListAdmin.php') { ?>
        <script src="assets/js/script.js"></script>
    <?php } ?>
    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/admin/gamesListAdmin.php') { ?>
        <script src="assets/js/gamesListAdmin.js"></script>
    <?php } ?>
    <?php if (
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/admin/usersListAdmin.php' ||
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/admin/gamesListAdmin.php' ||
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/admin/articlesListAdmin.php' ||
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/myDashboard.php' ||
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/addCommentUsers.php' ||
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/admin/modsListAdmin.php' ||
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/addOpinion.php'
    ) { ?>
        <script src="assets/js/userDelete.js"></script>
    <?php } ?>
    <?php if ($_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/connection.php') { ?>
        <script src="assets/js/registration.js"></script>
    <?php } ?>
    <?php if (
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/addEvaluation.php' ||
        $_SERVER['PHP_SELF'] == '/ProjetTPGameScreening/addEvaluationModif.php'
    ) { ?>
        <script src="assets/js/rating.js"></script>
    <?php } ?>


    </body>


    </html>