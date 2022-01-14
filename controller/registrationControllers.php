<?php
$user = new users;



$formErrors = [];
$regex = [
    'name' => '/^([A-Z]{1}[a-zâäàéèùêëîïôöçñ]+){1}([\- ]{1}[A-Z]{1}[a-zâäàéèùêëîïôöçñ]+)?$/',
    'email' => '/^([a-z0-9-_.]+){1}(@){1}([a-z]+){1}(\.){1}([a-z]{2,3}){1}$/',

];

if (count($_POST) > 0) {
    if (!empty($_POST['user'])) {
        // empty en plus de vérifier si la variable est vide, vérifie également si la variable est définie.
        if (preg_match($regex['name'], $_POST['user'])) {
            $user->name = strip_tags($_POST['user']);
        } else {
            $formErrors['user'] = 'Le nom d\'utilsateur est invalide. Il ne doit comporter que des lettres, des tirets, des espaces.';
        }
    } else {
        $formErrors['user'] = 'Votre nom d\'utilisateur est vide.';
    }

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = strip_tags($_POST['email']);
            if($user->mailDouble() > 0){
                $formErrors['email'] = 'Cette adresse mail existe déjà';
            }
        } else {
            $formErrors['email'] = 'Veuillez renseigner une adresse mail valide';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse mail';
    }

    /**
     *  password_hash : permet de chiffrer les mots de passe.
     * l'administrateur ne connais pas les mots de passe des utilisateurs
     */
    
    if (!empty($_POST['password'])) {
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $formErrors['password'] = 'Votre mot de passe est vide.';
    }
    if (!empty($_POST['confirmPassword'])&&!empty($_POST['password'])) {
        if ($_POST['password'] === $_POST['confirmPassword']) {
        } else {
            $formErrors['confirmPassword'] = 'Veuillez vérifier que le mot de passe et la confirmation de mot de passe sont identique';
        }
    } else {
        $formErrors['confirmPassword'] = 'Veuillez confirmer votre mot de passe.';
    }



    if (!empty($_POST['password2'])) {
        $user->password = password_hash($_POST['password2'], PASSWORD_DEFAULT);
    } else {
        $formErrors['password2'] = 'Votre mot de passe est vide.';
    }
    if (!empty($_POST['confirmPassword'])&&!empty($_POST['password2'])) {
        if ($_POST['password2'] === $_POST['confirmPassword']) {
        } else {
            $formErrors['confirmPassword'] = 'Veuillez vérifier que le mot de passe et la confirmation de mot de passe sont identique';
        }
    } else {
        $formErrors['confirmPassword'] = 'Veuillez confirmer votre mot de passe.';
    }
    
    if(count($formErrors) == 0){
        $user->addUser();
    }
}





