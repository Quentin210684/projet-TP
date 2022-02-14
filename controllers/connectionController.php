<?php

if (count($_POST) > 0) {
    $formErrors = [];

    $user = new users;

    if (!empty($_POST['user'])) {
        $user->name = $_POST['user'];
        if ($user->checkIfUserExists() > 0) {
            $hash = $user->selectPasswordByUsername();
        } else {
            $formErrors['user'] = $formErrors['password'] = 'Le nom d\'utilisateur ou le mot de passe est invalide.';
        }
    } else {
        $formErrors['user'] = 'Votre nom d\'utilisateur est vide.';
    }


    if (!empty($_POST['password'])) {
        if (isset($hash)) {
            if (password_verify($_POST['password'], $hash->password)) {
                $user = $user->selectUserByName();
                $_SESSION['user']->name = $_POST['user'];
                $_SESSION['user']->id_roles = $user->id_roles;
                $_SESSION['user']->id = $user->id;
                header('location: accueil');
                exit;
            }
        } else {
            $formErrors['password'] = $formErrors['user'] = 'Le nom d\'utilisateur ou le mot de passe est invalide.';
        }
    } else {
        $formErrors['password'] = 'Votre mot de passe est vide.';
    }
}
