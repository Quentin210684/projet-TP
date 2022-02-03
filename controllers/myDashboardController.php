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

];

/**
 * La fonction count permet de compter le nombres d'éléments dans le tableau $_POST
 * J'envoie le formulaire grâce à la méthode POST, il remplit donc mon tableau superglobal $_POST
 * Donc s'il y a un élément dans $_POST, c'est que mon formulaire a été envoyé
 * Permet de ne pas lancer les vérifications si le formulaire n'est pas envoyé et de na pas afficher les erreurs au démarrage
 */
if (count($_POST) > 0) {

    /**
     * 1 - Je vérifie que ma variable existe ET n'est pas vide. La fonction empty()  - vérifie ces deux conditions, pas besoin de compléter avec isset()
     * Cette condition est faisable aussi pour un champs non-obligatoire, il faut juste supprimer le else (pas d'erreur si le champs n'est pas rempli)
     * Les autres vérifications pour ce champs doivent se faire dans cette condition, il ne faut pas vérifier si une varible correspond à une regex s'il n'y a rien dedans
     * Si ça n'existe pas je crée un message d'erreur adapté
     */
    if (!empty($_POST['user'])) {

        /**
         * 2 - Je vérifie si ma variable correspond à ma Regex avec preg_match() -
         * Ca me permet de contrôler ce qui entrera plus tard dans ma base de données
         * Si ça ne correspond pas je crée un message d'erreur adapté
         */
        if (preg_match($regex['name'], $_POST['user'])) {
            /**
             * 2bis - Si tout se passe bien je peux enregistrer ma valeur
             * Je la stocke dans l'attribut de mon objet, l'username de mon objet $user
             * Le htmlspecialchars()- permet de désactiver les différentes balises html, cela nous protège en partie d'une possible faille xss
             * En principe, cette partie là pourrait paraître inutile car nous avons la regex qui n'autorise pas les chevrons
             * cependant, avec la cybersécurité 2,3 voire 4 sécurités valent mieux qu'une
             * Peut être remplacée par htmlentities() -
             */

             /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
            $user->name = strip_tags($_POST['user']);
        } else {
            $formErrors['user'] = 'Le nom d\'utilisateur est invalide. Il ne doit comporter que des lettre, des tirets, des espaces.';
        }
    } else {
        $formErrors['user'] = 'Votre nom d\'utilisateur est vide.';
    }


    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            /**
             * Le filter_var()  - permet de remplacer une regex trop complexe. Ici, l'adresse mail par exemple.
             * Le filtre 'FILTER_VALIDATE_EMAIL' est une constante. Les différents filtres existants sont dispos sur le site php.net : https://www.php.net/manual/fr/filter.filters.validate.php
             */

             /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
            $user->email = strip_tags($_POST['email']);
        } else {
            $formErrors['email'] = 'Veuillez renseigner une adresse mail valide';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse mail';
    }

    if (!empty($_POST['message'])) {
        if (preg_match($regex['message'], $_POST['message'])) {
            /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
            $user->name = strip_tags($_POST['message']);
        } else {
            $formErrors['message'] = 'Le nom d\'utilisateur est invalide. Il ne doit comporter que des lettre, des chiffres, des tirets, des espaces.';
        }
    } else {
        $formErrors['message'] = 'Votre message est vide.';
    }

    /**
     * Le tableau super global $_FILES se remplit dès que l'on envoie un fichier. Il crée alors une entrée ['nomDuFichier'] qui devient elle-même un tableau.
     * Ce nouveau tableau ($_FILES['nomDuFichier']) contient des informations très utiles comme le nom du fichier, sa taille et s'il y a eu une erreur lors de l'upload
     * Ce tableau $_FILES['nomDuFichier'] contient notamment une entrée error qui est à 0 si le fihier s'est bien uploadé
     
     */

    if ($_FILES['formFileMultiple']['error'] == 0) {

        /**
         * pathinfo renvoie un tableau (donc $fileInfos devient un tableau) séparant les différentes infos du fichier
         * Je mets l'extension en minuscule pour simplifier ma vérification
         **/
        $fileInfos = pathinfo($_FILES['formFileMultiple']['name']);
        $formFileMultipleExtension = strtolower($fileInfos['extension']);
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
         * La fonction array_key_exists() - 
         * permet de vérifier si un index existe dans un tableau, permet de vérifier si l'extension existe dans le tableau et donc si elle est autorisée
         * La fonction mime_content_type() -
         * détecte le type mime du fichier et le renvoie. Je me sers de l'extension du fichier pour récupérer le type MIME correspondant à cette extension
         * pour vérifier que le type MIME est bien celui qui correspond à l'extension
         */

        if (array_key_exists($formFileMultiple, $authorizedMimeTypes) && mime_content_type($_FILES['formFileMultiple']['tmp_name']) == $authorizedMimeTypes[$formFileMultiple]) {
            /**
             * move_uploaded_file() -
             * permet de déplacer un fichier dans un dossier sur le serveur où est hebergé le site
             */
            if (move_uploaded_file($_FILES['formFileMultiple']['tmp_name'], 'uploads/' . $_FILES['formFileMultiple']['name'])) {
                //donne des droits au fichiers, utiles pour les sites hébergés sur un serveur Linux

                chmod('uploads/' . $_FILES['formFileMultiple']['name'], 0644);
                $formFileMultiple->fichier = 'uploads/' . $_FILES['formFileMultiple']['name'];
            } else {
                $formErrors['formFileMultiple'] = 'Une erreur est survenue';
            }
        } else {
            $formErrors['formFileMultiple'] = 'Le fichier n\'est pas au bon format';
        }
    } else {
        $formErrors['formFileMultiple'] = 'Le fichier est obligatoire';
    }
    if (count($formErrors) == 0) {
        $user->updateUser();
        
    }
}
