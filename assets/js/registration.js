// ------------------------------------------------inscription-----------------------------------------------------------------------


let pass = document.getElementById('pass');
let pass2 = document.getElementById('pass2');

pass2.onkeyup = () => {
    // onkeyup me permet que quand la souris quitte son emplacement il me valide la 
    // comparaison entre mes deux passwords.
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

function onSubmit(token) {
    document.getElementById("recaptcha").submit();
}