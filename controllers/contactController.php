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
     * 1 - Je vérifie que ma variable existe ET n'est pas vide. La fonction empty() - vérifie ces deux conditions, pas besoin de compléter avec isset()
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
             * Le htmlspecialchars() - permet de désactiver les différentes balises html, cela nous protège en partie d'une possible faille xss
             * En principe, cette partie là pourrait paraître inutile car nous avons la regex qui n'autorise pas les chevrons
             * cependant, avec la cybersécurité 2,3 voire 4 sécurités valent mieux qu'une
             * Peut être remplacée par htmlentities() -
             */
            $user->name = strip_tags($_POST['user']);
            /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
        } else {
            $formErrors['user'] = 'Le nom d\'utilsateur est invalide. Il ne doit comporter que des lettre, des tirets, des espaces.';
        }
    } else {
        $formErrors['user'] = 'Votre nom d\'utilisateur est vide.';
    }

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            /**
         * Le filter_var() -  Ici, l'adresse mail par exemple.
         * Le filtre 'FILTER_VALIDATE_EMAIL' est une constante. Les différents filtres existants sont dispos sur le site php.net : https://www.php.net/manual/fr/filter.filters.validate.php
         */
            $user->email = strip_tags($_POST['email']);
            /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
        } else {
            $formErrors['email'] = 'Veuillez renseigner une adresse mail valide';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse mail';
    }


    if (!empty($_POST['subject'])) {
        /**
        * 2 - Je vérifie si ma variable correspond à ma Regex avec preg_match() -
        * Ca me permet de contrôler ce qui entrera plus tard dans ma base de données
        * Si ça ne correspond pas je crée un message d'erreur adapté
        */
       if (preg_match($regex['name'], $_POST['subject'])) {
           /**
            * 2bis - Si tout se passe bien je peux enregistrer ma valeur
            * Je la stocke dans l'attribut de mon objet, l'username de mon objet $user
            * Le htmlspecialchars() - permet de désactiver les différentes balises html, cela nous protège en partie d'une possible faille xss
            * En principe, cette partie là pourrait paraître inutile car nous avons la regex qui n'autorise pas les chevrons
            * cependant, avec la cybersécurité 2,3 voire 4 sécurités valent mieux qu'une
            * Peut être remplacée par htmlentities() -
            */
           $subject= strip_tags($_POST['subject']);
           /**
            * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
            * Elle génère des alertes si les balises sont incomplètes ou erronées.
            */
       } else {
           $formErrors['subject'] = 'Le nom d\'utilsateur est invalide. Il ne doit comporter que des lettre, des tirets, des espaces.';
       }
   } else {
       $formErrors['subject'] = 'Votre nom d\'utilisateur est vide.';
   }

    if (!empty($_POST['message'])) {
        
            $message = strip_tags($_POST['message']);
            /**
             * strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. 
             * Elle génère des alertes si les balises sont incomplètes ou erronées.
             */
        
    } else {
        $formErrors['message'] = 'Votre message est vide.';
    }
    if(empty($formErrors)){
        $message = '
<p>Bonjour ' . $_POST['user'] . '</p>
<p>Votre demande sera traitée dans les plus brefs délais</p>';

        $headers = array(
            'From' => 'no-reply@quentintirmant.fr',
            'MIME-Version' => '1.0',
            'content-type' => 'text/html; charset=UTF8'
        );
        //Personne à qui on envoie le mail, l'objet du mail, le contenu du mail, les en-têtes du mail 
        mail($_POST['email'], 'Bienvenue parmi nous', $message, $headers);
    }
}


