<?php
class mods extends database
{

    public $id;
    public $title;
    public $releaseDate;
    public $summary;
    public $trailer;
    public $picture;
    public $userValidatedOwner;
    public $file;
    public $id_users;
    public $id_games;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function addMod()
    {
        // Ici les ":" indiquent que ce sont des marqueurs nominatifs, ces valeurs sont vides, on prépare l'entrée de future données,
        $query = 'INSERT INTO `wc5m2_mods`(`title`, `releaseDate`, `summary`,`trailer`,`picture`,`userValidatedOwner`,`file`,`id_users`, `id_games`) '
            . 'VALUES (:title, :releaseDate, :summary, :trailer, :picture, :userValidatedOwner, :file, :id_users, :id_games);';
        // On utilise prepare lorsque l'on a des marqueurs nominatifs, mais elle n'execute pas la requete directement contrairement à query.
        $queryPrepare = $this->db->prepare($query);
        /**
         * Le bindvalue va attribuer les données aux marqueurs nominatifs
         * Le PARAM_STR va dire à la base de données de changer la valeur stockée en string. C'est une sécurité pour empêcher les 
         * attaques aux requêtes SQL
         */
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryPrepare->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':summary', $this->summary, PDO::PARAM_STR);
        $queryPrepare->bindValue(':trailer', $this->trailer, PDO::PARAM_STR);
        $queryPrepare->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryPrepare->bindValue(':userValidatedOwner', $this->userValidatedOwner, PDO::PARAM_INT);
        $queryPrepare->bindValue(':file', $this->file, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_games', $this->id_games, PDO::PARAM_INT);
        // L'execute va éxécuter la requête préparée avec les valeurs données dans le bindvalue qui elles, seront tirées de nos inputs
        // Enfin on retourne l'éxécute qui nous renvoi ici true ou false (booléan) car cette méthode ne nous permet pas des infos du "FETCH ou FETC ALL).
        return $queryPrepare->execute();
    }
    public function getModsList()
    {
        /**
         * L’utilisation la plus courante de SQL consiste à lire des données issues de la base de données.
         * Cela s’effectue grâce à la commande SELECT, qui retourne des enregistrements dans un tableau de résultat.
         * Cette commande peut sélectionner une ou plusieurs colonnes d’une table.
         */
        $query = 'SELECT wc5m2_mods.id, `title`, `summary`, `trailer`, `picture`, `userValidatedOwner`,releaseDate  ,`file`, `name`, `id_games` 
        FROM `wc5m2_mods`
        INNER JOIN `wc5m2_users` ON  wc5m2_mods.id_users = wc5m2_users.id 
        ORDER BY wc5m2_mods.id DESC ';
        $queryPrepare = $this->db->query($query);

        /**
         *  Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
         */
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    public function getModById()
    {
        $query = 'SELECT `title`, `summary`, `trailer`, `picture`, `userValidatedOwner`, `releaseDate` ,`file`, `id_users`, `id_games`
        FROM wc5m2_mods
        WHERE wc5m2_mods.id = :id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }

    public function updateMod()
    {
        $query = 'UPDATE `wc5m2_mods` SET `title`=:title, `releaseDate`=:releaseDate,`summary`=:summary, `trailer`=:trailer, `picture`=:picture, `userValidatedOwner`=:userValidatedOwner,`file`=:file, `id_users`=:id_users, `id_games`=:id_games
        WHERE id=:id ;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryPrepare->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':summary', $this->summary, PDO::PARAM_STR);
        $queryPrepare->bindValue(':trailer', $this->trailer, PDO::PARAM_STR);
        $queryPrepare->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $queryPrepare->bindValue(':userValidatedOwner', $this->userValidatedOwner, PDO::PARAM_INT);
        $queryPrepare->bindValue(':file', $this->file, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_games', $this->id_games, PDO::PARAM_INT);



        return $queryPrepare->execute();
    }

    public function deleteMod()
    /**
     * La commande DELETE en SQL permet de supprimer des lignes dans une table.
     *En utilisant cette commande associé à WHERE il est possible de sélectionner les lignes concernées qui seront supprimées.
     */
    {
        $query = 'DELETE FROM `wc5m2_mods` WHERE `id`= :id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

}
