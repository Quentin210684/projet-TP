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

function onClick(e) {
    e.preventDefault();
    grecaptcha.ready(function() {
        grecaptcha.execute('reCAPTCHA_site_key', { action: 'submit' }).then(function(token) {

        });
    });
}