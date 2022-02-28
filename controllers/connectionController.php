<?php
// Si mon formulaire a été envoyé
if (count($_POST) > 0) {
    // J'initialise mon tableau qui stockera mes messages d'erreurs
    $formErrors = [];
// J'instancie mon objet -j'appelle ma classe-
    $user = new users;

    /**
     * Si mon champs user n'est pas vide, alors je stocke son contenu dans l'attribut name de ma classe user, sinon j'informe
     * l'utilisateur que le champs est obligatoire. 
     * Si ce champs n'est pas vide, je vérifie également qu'il existe. Si ce n'est pas le cas, j'informe l'utilisateur que 
     * le pseudo ou le mot de passe est incorrect.
     */

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
