<?php
$user = new users;

$formErrors = [];
$regex = [
    'name' => '/^([A-Z]{1}[a-zâäàéèùêëîïôöçñ]+){1}([\- ]{1}[A-Z]{1}[a-zâäàéèùêëîïôöçñ]+)?$/',
    'email' => '/^([a-z0-9-_.]+){1}(@){1}([a-z]+){1}(\.){1}([a-z]{2,3}){1}$/',

];

if (count($_POST) > 0) {
    if (!empty($_POST['user'])) {
        if (preg_match($regex['name'], $_POST['user'])) {
            $user->name = strip_tags($_POST['user']);
        } else {
            $formErrors['user'] = 'Le nom d\'utilisateur est invalide. Il ne doit comporter que des lettre, des tirets, des espaces.';
        }
    } else {
        $formErrors['user'] = 'Votre nom d\'utilisateur est vide.';
    }

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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
}
