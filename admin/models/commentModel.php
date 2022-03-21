<?php

class comments extends database
{

    public $id;
    public $title;
    public $content;
    public $publicationDate;
    public $id_users;
    public $id_articles;
    public $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }


    public function addComment()
    // L’insertion de données dans une table s’effectue à l’aide de la commande INSERT INTO. 
    // Cette commande permet au choix d’inclure une seule ligne à la base existante ou plusieurs lignes d’un coup.
    {
        $query = 'INSERT INTO `wc5m2_comments` (`title`, `content`, `publicationDate`, `id_users`, `id_articles`) 
        VALUES (:title, :content, NOW() , :id_users, :id_articles);';
        $queryPrepare = $this->db->prepare($query);
        /**
         * Prépare une requête à l'exécution et retourne un objet
         */
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        /**
         * Associe une valeur à un paramètre
         */
        $queryPrepare->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_articles', $this->id_articles, PDO::PARAM_INT);
        /**
         * Exécute une requête préparée
         */
        // L'execute va éxécuter la requête préparée avec les valeurs données dans le bindvalue qui elles, seront tirées de nos inputs
        // Enfin on retourne l'éxécute qui nous renvoi ici true ou false (booléan) car cette méthode ne nous permet pas des infos du "FETCH ou FETCH ALL).

        return $queryPrepare->execute();
    }

    public function getCommentsList()
    {
        /** 
         * INNER JOIN permet de mettre 2 tables en commun
         * ON c'est la condition pour le mettre en commun
         */
        $query = 'SELECT  wc5m2_comments.title as title, wc5m2_comments.content as content , wc5m2_comments.publicationDate as publicationDate, name,id_users
        FROM `wc5m2_comments`
        INNER JOIN wc5m2_users ON wc5m2_comments.id_users = wc5m2_users.id
        INNER JOIN wc5m2_articles ON wc5m2_comments.id_articles = wc5m2_articles.id
        -- INNER JOIN wc5m2_articles ON wc5m2_evaluations.id_games = wc5m2_articles.id
        WHERE id_articles=:id_articles';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_articles', $this->id_articles, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCommentByUsers()
    {
        /** 
         * INNER JOIN permet de mettre 2 tables en commun
         * ON c'est la condition pour le mettre en commun
         */
        $query = 'SELECT COUNT(*) as commentCount
        FROM `wc5m2_comments`
        WHERE id_users =:id_users
        GROUP BY id_users;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    public function countCommentList()
    {
        /**
         * L’utilisation la plus courante de SQL consiste à lire des données issues de la base de données.
         * Cela s’effectue grâce à la commande SELECT, qui retourne des enregistrements dans un tableau de résultat.
         * Cette commande peut sélectionner une ou plusieurs colonnes d’une table.
         */

        /**
         * En SQL, la fonction d’agrégation COUNT() permet de compter le nombre d’enregistrement dans une table. 
         * Connaître le nombre de lignes dans une table est très pratique dans de nombreux cas, par exemple pour savoir combien de jeux 
         * sont présents dans une table ou pour connaître le nombre de commentaires sur un article.
         */
        $query = 'SELECT count(wc5m2_comments.id) AS articlesCounter , count(wc5m2_comments.id_users) AS commentsCounter '
            . 'FROM `wc5m2_comments` '
            . 'LEFT JOIN `wc5m2_articles` '
            . 'On wc5m2_comments.id_articles = wc5m2_comments.id ';
        $queryPrepare = $this->db->query($query);

        /**
         *  Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
         */
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }


    public function getCommentListByUSerID()
    {
        /** 
         * LEFT JOIN permet de mettre 2 tables en commun + toute la table comment + la table article en commun avec comment
         * ON c'est la condition pour le mettre en commun
         */
        $query = 'SELECT wc5m2_comments.id, wc5m2_comments.title, wc5m2_comments.content, wc5m2_comments.publicationDate as date, `id_users`, id_articles, picture
        FROM `wc5m2_comments`
        LEFT JOIN wc5m2_articles ON wc5m2_comments.id_articles = wc5m2_articles.id
        WHERE id_users =:id_users';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteComment()
    /**
     * La commande DELETE en SQL permet de supprimer des lignes dans une table.
     *En utilisant cette commande associé à WHERE il est possible de sélectionner les lignes concernées qui seront supprimées.
     */
    {
        $query = 'DELETE FROM `wc5m2_comments` WHERE `id`= :id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

    public function updateComment()
    {
        $query = 'UPDATE `wc5m2_comments` SET `title`=:title,`content`=:content, `publicationDate`=NOW()
        WHERE id=:id ;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryPrepare->bindValue(':content', $this->content, PDO::PARAM_STR);
        return $queryPrepare->execute();
    }
}
