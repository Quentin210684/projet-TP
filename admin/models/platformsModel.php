<?php
class platforms
{

    public $id;
    public $name;
    private $db;

    public function __construct()
    {
        try {
            /**
             * Le Data Source Name, ou DSN, qui contient les informations requises pour se connecter à la base.
             * Crée une instance PDO qui représente une connexion à la base
             * Le nom d'utilisateur pour la chaîne DSN. Ce paramètre est optionnel pour certains pilote PDO.
             * Le mot de passe de la chaîne DSN. Ce paramètre est optionnel pour certains pilote PDO.
             */
            return $this->db = new PDO('mysql:host=localhost; dbname=gamescreening; charset=UTF8', 'root', '2108171229');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    public function selectPlatformsList()
    {
        $query = 'SELECT id, name 
    FROM wc5m2_platforms';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}
