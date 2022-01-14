<?php
$user = new users;

$formErrors = [];
$regex = [
    'name' => '/^([A-Z]{1}[a-zâäàéèùêëîïôöçñ]+){1}([\- ]{1}[A-Z]{1}[a-zâäàéèùêëîïôöçñ]+)?$/',
    'email' => '/^([a-z0-9-_.]+){1}(@){1}([a-z]+){1}(\.){1}([a-z]{2,3}){1}$/',
    'message'=> '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ0-9]+)([- ]{1}[A-Z]{1}[a-z0-9À-ÖØ-öø-ÿ]+){0,1}$#',

];

if (count($_POST) > 0) {
    if (!empty($_POST['user'])) {
        if (preg_match($regex['name'], $_POST['user'])) {
            $user->name = strip_tags($_POST['user']);
        } else {
            $formErrors['user'] = 'Le nom d\'utilsateur est invalide. Il ne doit comporter que des lettre, des tirets, des espaces.';
        }
    } else {
        $formErrors['user'] = 'Votre nom d\'utilisateur est vide.';
    }

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // filter var permet 
            $user->email = strip_tags($_POST['email']);
        } else {
            $formErrors['email'] = 'Veuillez renseigner une adresse mail valide';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse mail';
    }

    if (!empty($_POST['message'])) {
        if (preg_match($regex['message'], $_POST['message'])) {
            $user->name = strip_tags($_POST['message']);
        } else {
            $formErrors['message'] = 'Le nom d\'utilsateur est invalide. Il ne doit comporter que des lettre, des chiffres, des tirets, des espaces.';
        }
    } else {
        $formErrors['message'] = 'Votre message est vide.';
    }
    
}


