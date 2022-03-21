<?php
class articles extends database
{

    public $id;
    public $title;
    public $content;
    public $publicationDate;
    public $picture;
    public $headline;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    /**
     * Méthode permettant d'ajouter un article dans la base de données.
     * Paramètres : title`, `content`,`$publicationDate
     * @return objet
     */
    public function addArticle()
    // L’insertion de données dans une table s’effectue à l’aide de la commande INSERT INTO. 
    // Cette commande permet au choix d’inclure une seule ligne à la base existante ou plusieurs lignes d’un coup.
    {
        $query = 'INSERT INTO `wc5m2_articles`(`title`, `content`,`publicationDate`, `picture`, `headline`) '
            . 'VALUES (:title, :content, NOW(), :picture, :headline);';
        $queryPrepare = $this->db->prepare($query);
        /**
         * Prépare une requête à l'exécution et retourne un objet
         */
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        /**
         * Associe une valeur à un paramètre
         */
        $queryPrepare->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryPrepare->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryPrepare->bindValue(':headline', $this->headline, PDO::PARAM_STR);
        /**
         * Exécute une requête préparée
         */

        // L'execute va éxécuter la requête préparée avec les valeurs données dans le bindvalue qui elles, seront tirées de nos inputs
        // Enfin on retourne l'éxécute qui nous renvoi ici true ou false (booléan) car cette méthode ne nous permet pas des infos du "FETCH ou FETCH ALL).

        return $queryPrepare->execute();
    }

    public function getArticleList()
    {

        $query = 'SELECT `id`, `title`, `content`, DATE_FORMAT(`publicationDate`, "%d/%m/%Y %H:%i:%s") AS publicationDate, `picture`, headline '
            . 'FROM `wc5m2_articles`';
        // La fonction DATE_FORMAT(), dans le langage SQL et plus particulièrement avec MySQL, 
        // permet de formater une donnée DATE dans le format indiqué
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }


    public function deleteArticle()
    /**
     * La commande DELETE en SQL permet de supprimer des lignes dans une table.
     *En utilisant cette commande associé à WHERE il est possible de sélectionner les lignes concernées qui seront supprimées.
     */
    {
        $query = 'DELETE FROM `wc5m2_articles` WHERE `id`= :id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    /**
     * Méthode permettant d'ajouter un article dans la base de données.
     * Paramètres : title, content, publicationDate, picture
     * @return objet
     */
    public function updateArticle()
    {
        $query = 'UPDATE `wc5m2_articles` SET `title`=:title, `content`=:content,`publicationDate`=NOW(), `picture`=:picture, `headline`=:headline 
        WHERE id=:id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryPrepare->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryPrepare->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryPrepare->bindValue(':headline', $this->headline, PDO::PARAM_STR);

        return $queryPrepare->execute();
    }


    public function getArticleById()
    {
        $query = 'SELECT id, title, content, publicationDate, picture, headline
        FROM wc5m2_articles
        WHERE id = :id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
}
