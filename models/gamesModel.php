<?php
class games
{

    public $id;
    public $title;
    public $releaseDate;
    public $earlyExitDate;
    public $summary;
    public $trailer;
    public $picture;
    public $id_graphisms;
    public $id_types;
    public $id_platforms;
    private $db;

    public function __construct()
    {
        try {
            return $this->db = new PDO('mysql:host=localhost; dbname=gamescreening; charset=UTF8', 'root', '2108171229');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

/**
     * Méthode permettant d'ajouter un jeu dans la base de données.
     * Paramètres : title, releaseDate, earlyExitDate, summary, trailer, picture, id_graphisms, id_genders, id_types, id_platforms
     * @return objet
     */
    public function addGame()
    {
        $query = 'INSERT INTO `wc5m2_games`(`title`, `releaseDate`,`earlyExitDate`,`summary`,`trailer`,`picture`,`id_graphisms`,`id_types`,`id_platforms`) '
            . 'VALUES (:title, :releaseDate, :earlyExitDate, :summary, :trailer, :picture, :id_graphisms, 1, 1);';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryPrepare->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':earlyExitDate', $this->earlyExitDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':summary', $this->summary, PDO::PARAM_STR);
        $queryPrepare->bindValue(':trailer', $this->trailer, PDO::PARAM_STR);
        $queryPrepare->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_graphisms', $this->id_graphisms, PDO::PARAM_INT);

        return $queryPrepare->execute();
    }

    /**
     * Méthode permettant de récupérer un jeu
     * Paramètres : id
     * @return objet
     */

    public function getGamesList()
    {
        $query = 'SELECT `title`, `releaseDate`,`earlyExitDate`,`summary`,`trailer`,`picture`,`id_graphisms`,`id_types`,`id_platforms` '
            . 'FROM `wc5m2_games`';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

}
