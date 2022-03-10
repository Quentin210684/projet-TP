search.onkeyup = () => {
    if (search.value.length >= 2) {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
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
        ajax.open('GET', 'controllers/addReviewController.php?search=' + search.value, true);
        ajax.send();
    }
}