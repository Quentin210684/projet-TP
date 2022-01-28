<?php
$user = new users;
/**
 * Je crée un tableau formErrors. Il va stocker des éléments de manière logique (toutes les erreurs).
 * formErrors : sert à stocker les messages d'erreur
 * Ca permet de ne pas chercher de nom de variable
 */
$formErrors = [];
$regex = [
    'name' => '/^([A-Z]{1}[a-zâäàéèùêëîïôöçñ]+){1}([\- ]{1}[A-Z]{1}[a-zâäàéèùêëîïôöçñ]+)?$/',
    'email' => '/^([a-z0-9-_.]+){1}(@){1}([a-z]+){1}(\.){1}([a-z]{2,3}){1}$/',
    /**
 * Je crée une regex pour le nom d'utilisateur
 * ^$ : marquent le début et la fin de la chaîne de caractère / permettent de dire que toute la chaîne doit correpondre à la Regex
 * a-z : autorise les lettres en minuscules
 * A-Z : autorise les lettres en majuscules
 * 0-9 : autorise les nombres
 */
];

/**
 * La fonction count permet de compter le nombres d'éléments dans le tableau $_POST
 * J'envoie le formulaire grâce à la méthode POST, il remplit donc mon tableau superglobal $_POST
 * Donc s'il y a un élément dans $_POST, c'est que mon formulaire a été envoyé
 * Permet de ne pas lancer les vérifications si le formulaire n'est pas envoyé et de na pas afficher les erreurs au démarrage
 */
if (count($_POST) > 0) {

    /**
     * 1 - Je vérifie que ma variable existe ET n'est pas vide. La fonction empty() - https://www.php.net/manual/fr/function.empty.php - vérifie ces deux conditions, pas besoin de compléter avec isset()
     * Cette condition est faisable aussi pour un champs non-obligatoire, il faut juste supprimer le else (pas d'erreur si le champs n'est pas rempli)
     * Les autres vérifications pour ce champs doivent se faire dans cette condition, il ne faut pas vérifier si une varible correspond à une regex s'il n'y a rien dedans
     * Si ça n'existe pas je crée un message d'erreur adapté
     */
    if (!empty($_POST['user'])) {
        /**
         * 2 - Je vérifie si ma variable correspond à ma Regex avec preg_match() - https://www.php.net/manual/fr/function.preg-match.php
         * Ca me permet de contrôler ce qui entrera plus tard dans ma base de données
         * Si ça ne correspond pas je crée un message d'erreur adapté
         */

        if (preg_match($regex['name'], $_POST['user'])) {
            /**
             * 2bis - Si tout se passe bien je peux enregistrer ma valeur
             * Je la stocke dans l'attribut de mon objet, l'username de mon objet $user
             * Le htmlspecialchars()  - permet de désactiver les différentes balises html, cela nous protège en partie d'une possible faille xss
             * En principe, cette partie là pourrait paraître inutile car nous avons la regex qui n'autorise pas les chevrons
             * cependant, avec la cybersécurité 2,3 voire 4 sécurités valent mieux qu'une
             * Peut être remplacée par htmlentities() -
             */
            $user->name = strip_tags($_POST['user']);
        } else {
            $formErrors['user'] = 'Le nom d\'utilisateur est invalide. Il ne doit comporter que des lettre, des tirets, des espaces.';
        }
    } else {
        $formErrors['user'] = 'Votre nom d\'utilisateur est vide.';
    }


    if (!empty($_POST['password'])) {

        /**
             * Une fois toutes les vérifications effectuées pour le mot de passe, je le hash avec la fonction password_hash() - 
             * Elle nous permet de changer une simple chaîne de caractère en une une chaine 
             * de caractère chiffrée 
             * (ex: $2y$10$hxfuzVxmCmR3ze6sxlm8begpI00yFqhhPOG2kgI0aT5Wp.sJ0SxKm )
             * Les différents hash existants sont listés dans la documentation
             */
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $formErrors['password'] = 'Votre mot de passe est vide.';
    }
    if (!empty($_POST['confirmPassword']) && !empty($_POST['password'])) {
        if ($_POST['password'] === $_POST['confirmPassword']) {
        } else {
            $formErrors['confirmPassword'] = 'Veuillez vérifier que le mot de passe et la confirmation de mot de passe sont identique';
        }
    } else {
        $formErrors['confirmPassword'] = 'Veuillez confirmer votre mot de passe.';
    }
}
