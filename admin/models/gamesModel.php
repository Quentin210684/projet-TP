<?php
class games
{

    public $id;
    public $title;
    public $developpers;
    public $releaseDate;
    public $earlyExitDate;
    public $summary;
    public $trailer;
    public $picture;
    public $id_graphisms;
    public $id_types;
    public $id_platforms;

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
        $query = 'INSERT INTO `wc5m2_games`(`title`, `developpers`, `releaseDate`,`earlyExitDate`,`summary`,`trailer`,`picture`,`id_graphisms`,`id_types`,`id_platforms`) '
            . 'VALUES (:title, :developpers, :releaseDate, :earlyExitDate, :summary, :trailer, :picture, :id_graphisms, :id_types, :id_platforms);';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryPrepare->bindValue(':developpers', $this->developpers, PDO::PARAM_STR);
        $queryPrepare->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':earlyExitDate', $this->earlyExitDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':summary', $this->summary, PDO::PARAM_STR);
        $queryPrepare->bindValue(':trailer', $this->trailer, PDO::PARAM_STR);
        $queryPrepare->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_graphisms', $this->id_graphisms, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_types', $this->id_types, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_platforms', $this->id_platforms, PDO::PARAM_INT);


        return $queryPrepare->execute();
    }

    /**
     * Méthode permettant de récupérer un jeu
     * Paramètres : id
     * @return objet
     */

    public function getGamesList()
    {
        $query = 'SELECT wc5m2_games.id, `title`, `developpers`, `releaseDate`,`earlyExitDate`,`summary`,`trailer`,`picture`,wc5m2_graphisms.name AS graphismName, wc5m2_types.name AS typesName, wc5m2_platforms.name AS platformsName  '
            . 'FROM `wc5m2_games` '
            . 'INNER JOIN `wc5m2_graphisms` ON  wc5m2_games.id_graphisms = wc5m2_graphisms.id '
            . 'INNER JOIN `wc5m2_types` ON  wc5m2_games.id_types = wc5m2_types.id '
            . 'INNER JOIN `wc5m2_platforms` ON  wc5m2_games.id_platforms = wc5m2_platforms.id ';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteGame()
    /**
     * La commande DELETE en SQL permet de supprimer des lignes dans une table.
     *En utilisant cette commande associé à WHERE il est possible de sélectionner les lignes concernées qui seront supprimées.
     */
    {
        $query = 'DELETE FROM `wc5m2_games` WHERE `id`= :id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
    /**
     * Méthode permettant d'ajouter un jeu dans la base de données.
     * Paramètres : title, releaseDate, earlyExitDate, summary, trailer, picture, id_graphisms, id_genders, id_types, id_platforms
     * @return objet
     */
    public function updateGame()
    {
        $query = 'UPDATE `wc5m2_games` SET `title`=:title, `developpers`=:developpers,`releaseDate`=:releaseDate,`earlyExitDate`=:earlyExitDate,`summary`=:summary,`trailer`=:trailer,`picture`=:picture,`id_graphisms`=:id_graphisms,`id_types`=:id_types, `id_platforms`=:id_platforms 
        WHERE id=:id ;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryPrepare->bindValue(':developpers', $this->developpers, PDO::PARAM_STR);
        $queryPrepare->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':earlyExitDate', $this->earlyExitDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':summary', $this->summary, PDO::PARAM_STR);
        $queryPrepare->bindValue(':trailer', $this->trailer, PDO::PARAM_STR);
        $queryPrepare->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_graphisms', $this->id_graphisms, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_types', $this->id_types, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_platforms', $this->id_platforms, PDO::PARAM_INT);



        return $queryPrepare->execute();
    }

    public function getGameById()
    {
        $query = 'SELECT title, developpers, releaseDate, earlyExitDate, summary, trailer, picture, id_graphisms, id_types, id_platforms
        FROM wc5m2_games
        WHERE id = :id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
}
