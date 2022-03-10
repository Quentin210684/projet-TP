<?php
$comment = new comments;
$commentList = $comment->getCommentListByUSerID(); 
$article = new articles;



$formErrors = [];

$regex = [
    'name' => '/^([A-Z0-9]{1}[a-zA-Z0-9âäàéèùêëîïôöçñ!?.:,®™&™®å🐙\' ]+){1}([\- ]{1}[A-Z09]{1}[a-zA-Z0-9âäàéèùêëîïôöçñ!?.:,®™&™®å🐙\' ]+)?$/',

    /**
 * Je crée une regex pour le nom d'utilisateur
 * ^$ : marquent le début et la fin de la chaîne de caractère / permettent de dire que toute la chaîne doit correpondre à la Regex
 * a-z : autorise les lettres en minuscules
 * A-Z : autorise les lettres en majuscules
 * 0-9 : autorise les nombres
 */

];



if (count($_POST) > 0) {
    $comment->id_articles=$_GET['id'];

    $comment->id_users=$_SESSION['user']->id;
    /**
     * La fonction count permet de compter le nombres d'éléments dans le tableau $_POST
     * J'envoie le formulaire grâce à la méthode POST, il remplit donc mon tableau superglobal $_POST
     * Donc s'il y a un élément dans $_POST, c'est que mon formulaire a été envoyé
     * Permet de ne pas lancer les vérifications si le formulaire n'est pas envoyé et de na pas afficher les erreurs au démarrage
     */
    

    if (!empty($_POST['titleArticle'])) {
        /**
         * 2 - Je vérifie si ma variable correspond à ma Regex avec preg_match()
         * Ca me permet de contrôler ce qui entrera plus tard dans ma base de données
         * Si ça ne correspond pas je crée un message d'erreur adapté
         */
        if (preg_match($regex['name'], $_POST['titleArticle'])) {
            /**
             * 2bis - Si tout se passe bien je peux enregistrer ma valeur
             * Je la stocke dans l'attribut de mon objet, l'username de mon objet $user
             * Le htmlspecialchars() - permet de désactiver les différentes balises html, cela nous protège en partie d'une possible faille xss
             * En principe, cette partie là pourrait paraître inutile car nous avons la regex qui n'autorise pas les chevrons
             * cependant, avec la cybersécurité 2,3 voire 4 sécurités valent mieux qu'une
             * Peut être remplacée par htmlentities() -
             */
            $comment->title = strip_tags($_POST['titleArticle']);
            /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
        } else {
            $formErrors['titleArticle'] = 'Le titre est invalide. Il ne doit comporter que des lettres, des tirets, des espaces.';
        }
    } else {
        $formErrors['titleArticle'] = 'Votre titre est vide.';
    }


    if (!empty($_POST['content'])) {
        $comment->content = strip_tags($_POST['content']);
        /**
         * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
         * Elle génère des alertes si les balises sont incomplètes ou erronées.
         */
    } else {
        $formErrors['content'] = 'Votre message est vide.';
    }

    if (count($formErrors) == 0) {
        var_dump($comment->addComment());
    }
}
// var_dump($_POST);
// var_dump($comment);


