let undying = document.getElementById('undying');

undying.onclick = () => {
    // .classList.contains permet de verifier si l'element contient bien ce qui est entre parenthese
    // .remove va annuler ce qui est entre parenthese et .add va au contraire rajouter
    if (undying.classList.contains('animate__animated animate__flip')) {
        undying.setAttribute('src', 'assets/img/undying-test2recto2.png');
        undying.classList.remove('animate__fadeInLeft');
        undying.classList.add('animate__fadeInRight');
    } else {
        undying.setAttribute('src', 'assets/img/undying-test2.webp');
        undying.classList.remove('animate__fadeInRight');
        undying.classList.add('animate__fadeInLeft');
    }
}