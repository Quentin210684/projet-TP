<?php

$types = new types;
$typesList = $types->selectTypesList();


$graphism = new graphisms;
$graphismsList = $graphism->selectGraphismsList();

$platforms = new platforms;
$platformsList = $platforms->selectPlatformsList();


$game = new games;
$game->id = $_GET['id'];

$formData = [];
$formErrors = [];

/**
 * Je crée les tableaux formData et formErrors. Ils vont stocker des éléments de manière logique (toutes les erreurs ou toutes les données).
 * formData : sert à stocker les éléments du formulaire une fois vérifiés
 * formErrors : sert à stocker les messages d'erreur
 * Ca permet de ne pas chercher de nom de variable
 */

$regex = [
    'name' => '/^([A-Z]{1}[a-zâäàéèùêëîïôöçñ ]+){1}([\- ]{1}[A-Z]{1}[a-zâäàéèùêëîïôöçñ ]+)?$/',

    /**
 * Je crée une regex pour le nom d'utilisateur
 * ^$ : marquent le début et la fin de la chaîne de caractère / permettent de dire que toute la chaîne doit correpondre à la Regex
 * a-z : autorise les lettres en minuscules
 * A-Z : autorise les lettres en majuscules
 * 0-9 : autorise les nombres
 */

];



if (count($_POST) > 0) {


    /**
     * La fonction count permet de compter le nombres d'éléments dans le tableau $_POST
     * J'envoie le formulaire grâce à la méthode POST, il remplit donc mon tableau superglobal $_POST
     * Donc s'il y a un élément dans $_POST, c'est que mon formulaire a été envoyé
     * Permet de ne pas lancer les vérifications si le formulaire n'est pas envoyé et de na pas afficher les erreurs au démarrage
     */



    if ($_FILES['picture']['error'] == 0) {
        /**
         * Le tableau super global $_FILES se remplit dès que l'on envoie un fichier. Il crée alors une entrée ['nomDuFichier'] qui devient elle-même un tableau.
         * Ce nouveau tableau ($_FILES['nomDuFichier']) contient des informations très utiles comme le nom du fichier, sa taille et s'il y a eu une erreur lors de l'upload
         * Ce tableau $_FILES['nomDuFichier'] contient notamment une entrée error qui est à 0 si le fihier s'est bien uploadé
         */
        $fileInfos = pathinfo($_FILES['picture']['name']);
        /**
         * pathinfo renvoie un tableau (donc $fileInfos devient un tableau) séparant les différentes infos du fichier
         * Je mets l'extension en minuscule pour simplifier ma vérification
         **/
        $pictureExtension = strtolower($fileInfos['extension']);

        /**
         * Je crée un tableau associatif des extentions avec les types mimes associés
         */
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif'

        ];

        /**
         * La fonction array_key_exists() 
         * permet de vérifier si un index existe dans un tableau, permet de vérifier si l'extension existe dans le tableau et donc si elle est autorisée
         * La fonction mime_content_type() -
         * détecte le type mime du fichier et le renvoie. Je me sers de l'extension du fichier pour récupérer le type MIME correspondant à cette extension
         * pour vérifier que le type MIME est bien celui qui correspond à l'extension
         */
        if (array_key_exists($pictureExtension, $authorizedMimeTypes) && mime_content_type($_FILES['picture']['tmp_name']) == $authorizedMimeTypes[$pictureExtension]) {
            /**
             * move_uploaded_file() 
             * permet de déplacer un fichier dans un dossier sur le serveur où est hebergé le site
             */

            if (move_uploaded_file($_FILES['picture']['tmp_name'], '../uploads/' . $_FILES['picture']['name'])) {
                //donne des droits au fichiers, utiles pour les sites hébergés sur un serveur Linux

                chmod('../uploads/' . $_FILES['picture']['name'], 0644);
                $game->picture = '../../uploads/' . $_FILES['picture']['name'];
            } else {
                $formErrors['picture'] = 'Une erreur est survenue';
            }
        } else {
            $formErrors['picture'] = 'Le fichier n\'est pas au bon format';
        }
    } else {
        $formErrors['picture'] = 'Le fichier est obligatoire';
    }

    /**
     * 1 - Je vérifie que ma variable existe ET n'est pas vide. La fonction empty() - https://www.php.net/manual/fr/function.empty.php - vérifie ces deux conditions, pas besoin de compléter avec isset()
     * Cette condition est faisable aussi pour un champs non-obligatoire, il faut juste supprimer le else (pas d'erreur si le champs n'est pas rempli)
     * Les autres vérifications pour ce champs doivent se faire dans cette condition, il ne faut pas vérifier si une varible correspond à une regex s'il n'y a rien dedans
     * Si ça n'existe pas je crée un message d'erreur adapté
     */
    if (!empty($_POST['title'])) {
        /**
         * 2 - Je vérifie si ma variable correspond à ma Regex avec preg_match() - https://www.php.net/manual/fr/function.preg-match.php
         * Ca me permet de contrôler ce qui entrera plus tard dans ma base de données
         * Si ça ne correspond pas je crée un message d'erreur adapté
         */
        if (preg_match($regex['name'], $_POST['title'])) {
            /**
             * 2bis - Si tout se passe bien je peux enregistrer ma valeur
             * Je la stocke dans l'attribut de mon objet, l'username de mon objet $user
             * Le htmlspecialchars() - permet de désactiver les différentes balises html, cela nous protège en partie d'une possible faille xss
             * En principe, cette partie là pourrait paraître inutile car nous avons la regex qui n'autorise pas les chevrons
             * cependant, avec la cybersécurité 2,3 voire 4 sécurités valent mieux qu'une
             * Peut être remplacée par htmlentities() -
             */
            $game->title = strip_tags($_POST['title']);
            /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
        } else {
            $formErrors['title'] = 'Le titre est invalide. Il ne doit comporter que des lettres, des tirets, des espaces.';
        }
    } else {
        $formErrors['title'] = 'Votre titre est vide.';
    }

    if (!empty($_POST['developpers'])) {
        if (preg_match($regex['name'], $_POST['developpers'])) {
            $game->developpers = strip_tags($_POST['developpers']);
            /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
        } else {
            $formErrors['developpers'] = 'Le titre est invalide. Il ne doit comporter que des lettres, des tirets, des espaces.';
        }
    } else {
        $formErrors['developpers'] = 'Votre titre est vide.';
    }


    $game->releaseDate = $_POST['releaseDate'];
    $game->earlyExitDate = $_POST['earlyExitDate'];
    $game->id_graphisms = $_POST['id_graphisms'];
    $game->id_types = $_POST['id_types'];
    $game->id_platforms = $_POST['id_platforms'];


    if (!empty($_POST['trailer'])) {
        if (filter_var($_POST['trailer'], FILTER_VALIDATE_URL)) {
            /**
             * Le filter_var()  - permet de remplacer une regex trop complexe. Ici, l'adresse mail par exemple.
             * Le filtre 'FILTER_VALIDATE_EMAIL' est une constante. Les différents filtres existants sont dispos sur le site php.net
             */
            $game->trailer = strip_tags($_POST['trailer']);
        } else {
            $formErrors['email'] = 'Veuillez renseigner une adresse url valide';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse url';
    }



    if (!empty($_POST['summary'])) {

        $game->summary = strip_tags($_POST['summary']);
        /**
         * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
         * Elle génère des alertes si les balises sont incomplètes ou erronées.
         */
    } else {
        $formErrors['summary'] = 'Votre message est vide.';
    }
    if (count($formErrors) == 0) {
        $game->updateGame();
    }
}
$gameDetails = $game->getGameById();

var_dump($gameDetails);
/**
 * var_dump() affiche les informations structurées d'une variable, y compris son type et sa valeur.
 */
