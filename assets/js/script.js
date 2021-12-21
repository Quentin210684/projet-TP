AOS.init();
//JS conccernant la barre de recherche------------------------------------------------------ 
let debut = document.getElementById('debut');
let fin = document.getElementById('fin');
let button = document.getElementById('button');
let buttonCLose = document.getElementById('buttonClose');

// utilisation de "add" afin de rajouter une class à un element
// et remove afin d'enlever la class precedement créer
document.getElementById("button")
    .addEventListener("click", function() {
        debut.classList.add('d-none');
        fin.classList.add('d-flex');
        fin.classList.remove('d-none');
    }, false);

buttonClose.onclick = () => {
        debut.classList.remove('d-none');
        fin.classList.remove('d-flex');
        fin.classList.add('d-none');
    }
    // -----------------------------------------image animé game test--------------------------------------------------



// ------------------------------------------------inscription-----------------------------------------------------------------------


let pass = document.getElementById('pass');
let pass2 = document.getElementById('pass2');

pass2.onkeyup = () => {
    if (pass.value == pass2.value) {
        pass.classList.add('is-valid');
        pass2.classList.add('is-valid');
        pass.classList.remove('is-invalid');
        pass2.classList.remove('is-invalid');
    } else {
        pass.classList.add('is-invalid');
        pass2.classList.add('is-invalid');
        pass.classList.remove('is-valid');
        pass2.classList.remove('is-valid');
    }


}