<?php
class games extends database
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
    public $offset;
    public $limit;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    /**
     * Méthode permettant d'ajouter un jeu dans la base de données.
     * Paramètres : title, releaseDate, earlyExitDate, summary, trailer, picture, id_graphisms, id_genders, id_types, id_platforms
     * @return objet
     */
    public function addGame()
    {
        // Ici les ":" indiquent que ce sont des marqueurs nominatifs, ces valeurs sont vides, on prépare l'entrée de future données,
        $query = 'INSERT INTO `wc5m2_games`(`title`, `developpers`, `releaseDate`,`earlyExitDate`,`summary`,`trailer`,`picture`,`id_graphisms`,`id_types`,`id_platforms`) '
            . 'VALUES (:title, :developpers, :releaseDate, :earlyExitDate, :summary, :trailer, :picture, :id_graphisms, :id_types, :id_platforms);';
        // On utilise prepare lorsque l'on a des marqueurs nominatifs, mais elle n'execute pas la requete directement contrairement à query.
        $queryPrepare = $this->db->prepare($query);
        /**
         * Le bindvalue va attribuer les données aux marqueurs nominatifs
         * Le PARAM_STR va dire à la base de données de changer la valeur stockée en string. C'est une sécurité pour empêcher les 
         * attaques aux requêtes SQL
         */
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
        // L'execute va éxécuter la requête préparée avec les valeurs données dans le bindvalue qui elles, seront tirées de nos inputs
        // Enfin on retourne l'éxécute qui nous renvoi ici true ou false (booléan) car cette méthode ne nous permet pas des infos du "FETCH ou FETC ALL).
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
            . 'INNER JOIN `wc5m2_platforms` ON  wc5m2_games.id_platforms = wc5m2_platforms.id '
            . 'ORDER BY wc5m2_games.id DESC '
            . 'LIMIT :limit OFFSET :offset';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':offset',$this->offset, PDO::PARAM_INT);
        $queryPrepare->bindValue(':limit',$this->limit, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    public function getGamesSearchList()
    {
        $query = 'SELECT `title`, `picture`, `id` FROM `wc5m2_games` WHERE title LIKE :title ';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':title', '%' . $this->title . '%', PDO::PARAM_STR);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }


    public function getGamesListHome()
    {
        $query = 'SELECT wc5m2_games.id, `title`, `developpers`, `releaseDate`,`earlyExitDate`,`summary`,`trailer`,`picture`,wc5m2_graphisms.name AS graphismName, wc5m2_types.name AS typesName, wc5m2_platforms.name AS platformsName  '
            . 'FROM `wc5m2_games` '
            . 'INNER JOIN `wc5m2_graphisms` ON  wc5m2_games.id_graphisms = wc5m2_graphisms.id '
            . 'INNER JOIN `wc5m2_types` ON  wc5m2_games.id_types = wc5m2_types.id '
            . 'INNER JOIN `wc5m2_platforms` ON  wc5m2_games.id_platforms = wc5m2_platforms.id '
            . 'ORDER BY wc5m2_games.id DESC '
            . 'LIMIT 4';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }


    public function countGamesList()
    {
        /**
         * L’utilisation la plus courante de SQL consiste à lire des données issues de la base de données.
         * Cela s’effectue grâce à la commande SELECT, qui retourne des enregistrements dans un tableau de résultat.
         * Cette commande peut sélectionner une ou plusieurs colonnes d’une table.
         */
        $query = 'SELECT count(wc5m2_games.id) AS gamesCounter , count(wc5m2_evaluations.id_games) AS evaluationsCounter '
            . 'FROM `wc5m2_games` '
            . 'LEFT JOIN `wc5m2_evaluations` '
            . 'On wc5m2_evaluations.id_games = wc5m2_games.id ';
        $queryPrepare = $this->db->query($query);

        /**
         *  Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
         */
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
     * Méthode permettant de modifier un jeu dans la base de données.
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
        $query = 'SELECT title, developpers, releaseDate, earlyExitDate, summary, trailer, picture, id_graphisms, wc5m2_types.name AS typesName, id_platforms
        FROM wc5m2_games
        INNER JOIN `wc5m2_types` ON  wc5m2_games.id_types = wc5m2_types.id 
        WHERE wc5m2_games.id = :id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }

    public function countGamesPages(){
        $query = 'SELECT COUNT(id) AS cpt FROM wc5m2_games';
        $queryPrepare = $this->db->query($query);
        $queryResult = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $queryResult->cpt;
    }

    public function getGamesListAdmin()
    {
        $query = 'SELECT wc5m2_games.id, `title`, `developpers`, `releaseDate`,`earlyExitDate`,`summary`,`trailer`,`picture`,wc5m2_graphisms.name AS graphismName, wc5m2_types.name AS typesName, wc5m2_platforms.name AS platformsName  '
            . 'FROM `wc5m2_games` '
            . 'INNER JOIN `wc5m2_graphisms` ON  wc5m2_games.id_graphisms = wc5m2_graphisms.id '
            . 'INNER JOIN `wc5m2_types` ON  wc5m2_games.id_types = wc5m2_types.id '
            . 'INNER JOIN `wc5m2_platforms` ON  wc5m2_games.id_platforms = wc5m2_platforms.id '
            . 'ORDER BY wc5m2_games.id DESC ';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
    public function getGamesListForMods()
    {
        $query = 'SELECT id, `title` '
            . 'FROM `wc5m2_games` ';   
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}
