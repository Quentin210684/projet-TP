let undying = document.getElementById('undying');

undying.onclick = () => {
    // .classList.contains permet de verifier si l'element contient bien ce qui est entre parenthese
    // .remove va annuler ce qui est entre parenthese et .add va au contraire rajouter
    if (undying.classList.contains('animate__fadeInLeft')) {
        undying.setAttribute('src', 'assets/img/undying2.png');
        undying.classList.remove('animate__fadeInLeft');
        undying.classList.add('animate__flip');
    } else {
        undying.setAttribute('src', 'assets/img/undying1.webp');
        undying.classList.remove('animate__fadeInRight');
        undying.classList.add('animate__fadeInLeft');
    }
}