// Ajax permet de modifier partiellement la page affichée par le navigateur pour la mettre à jour sans avoir à recharger la page entière.
/**
 * L'objet XMLHttpRequest lit des données ou fichiers sur le serveur de façon asynchrone.
 * Le terme "Asynchronous", asynchrone en français, signifie que l'exécution de JavaScript continue sans attendre la réponse du serveur qui 
 * sera traitée quand elle arrivera. Tandis qu'en mode synchrone, le navigateur serait gelé en attendant la réponse du serveur.
 *  */
search.onkeyup = () => {
    if (search.value.length >= 2) {

        // Première étape: créer une instance
        //XMLHttpRequest() permet d'interagir avec le serveur, grâce à ses méthodes et ses attributs.
        var ajax = new XMLHttpRequest();

        // Seconde étape: attendre la réponse
        //onreadystatechange est propriété activée par un évènement de changement d'état. On lui assigne une fonction.
        ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // le code d'état passe successivement de 0 à 4 qui signifie "prêt".
                    // 200 est ok / 404 si la page n'est pas trouvée.
                    gameOpinionDiv.innerHTML = '';
                    let gameOpinion = JSON.parse(this.responseText);
                    for (game of gameOpinion) {
                        console.log(game);
                        gameOpinionDiv.innerHTML += '<div class="card" style="width: 18rem;">' +
                            '<a class="text-decoration-none"  href="pageJeux_' + game.id + '">' +
                            '<img src = "assets/img/' + game.picture + '" class="card-img-top img-fluid" alt = "..." >' +
                            '<div class="card-body d-grid justify-content-center">' +
                            '<h5 class="card-title text-center text-black ">' + game.title + '</h5>' +
                            '</div>' +
                            '</div></a>';
                    }
                }
            }
            // Troisième étape: faire la requête elle-même
            // Méthodes open(mode, url, boolean)
            /**
             * mode: type de requête, GET ou POST
                url: l'endroit ou trouver les données, un fichier avec son chemin sur le disque.
                boolean: true (asynchrone) / false (synchrone).
                en option on peut ajouter un login et un mot de passe.  
             */
        ajax.open('GET', 'controllers/addReviewController.php?search=' + search.value, true);
        ajax.send();
    }
}