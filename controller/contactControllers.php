<?php
$formErrors = [];
$regex = [
    'name' => '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#',
    'email' => '/^([a-z0-9-_.]+){1}(@){1}([a-z]+){1}(\.){1}([a-z]{2,3}){1}$/',

];

if (count($_POST) > 0) {
    if (!empty($_POST['user'])) {
        if (preg_match($regex['name'], $_POST['user'])) {
            $user = strip_tags($_POST['user']);
        } else {
            $formErrors['user'] = 'Le nom d\'utilsateur est invalide. Il ne doit comporter que des lettre, des tirets, des espaces.';
        }
    } else {
        $formErrors['user'] = 'Votre nom d\'utilisateur est vide.';
    }

    if (!empty($_POST['email'])) {
        if (preg_match($regex['email'], $_POST['email'])) {
            $email = strip_tags($_POST['email']);
        } else {
            $formErrors['email'] = 'Votre email est invalide. Il ne doit comporter que des lettres, des tirets, des espaces et des minuscules ';
        }
    } else {
        $formErrors['email'] = 'Votre email est vide.';
    }
}

