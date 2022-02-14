
<?php
class users extends database
{

    public $id;
    public $name;
    public $email;
    public $password;
    public $starred;
    public $blocked;
    public $id_roles;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    /**
     * Méthode permettant d'ajouter un utilisateur dans la base de données.
     * Paramètres : name, email, password, starred, blocked
     * @return objet
     */
    public function addUser()
    {
        // L’insertion de données dans une table s’effectue à l’aide de la commande INSERT INTO. 
        // Cette commande permet au choix d’inclure une seule ligne à la base existante ou plusieurs lignes d’un coup.
        $query = 'INSERT INTO `wc5m2_users`(`name`, `email`,`password`,`starred`,`blocked`,`id_roles`) '
            . 'VALUES (:name, :email, :password, 0, 0, 2);';
        $queryPrepare = $this->db->prepare($query);
        /**
         * Prépare une requête à l'exécution et retourne un objet
         */
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        /**
         * Associe une valeur à un paramètre
         */
        $queryPrepare->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryPrepare->bindValue(':password', $this->password, PDO::PARAM_STR);
        /**
         * Exécute une requête préparée
         */
        return $queryPrepare->execute();
    }

    /**
     * Méthode permettant de récupérer un utilisateur
     * Paramètres : id
     * @return objet
     */

    public function getUsersList()
    {
        /**
         * L’utilisation la plus courante de SQL consiste à lire des données issues de la base de données.
         * Cela s’effectue grâce à la commande SELECT, qui retourne des enregistrements dans un tableau de résultat.
         * Cette commande peut sélectionner une ou plusieurs colonnes d’une table.
         */
        $query = 'SELECT `id`, `name`, `email`, `starred`, `blocked`, `id_roles` '
            . 'FROM `wc5m2_users`';
        $queryPrepare = $this->db->query($query);

        /**
         *  Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
         */
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }


    public function countUsersList()
    {
        /**
         * L’utilisation la plus courante de SQL consiste à lire des données issues de la base de données.
         * Cela s’effectue grâce à la commande SELECT, qui retourne des enregistrements dans un tableau de résultat.
         * Cette commande peut sélectionner une ou plusieurs colonnes d’une table.
         */
        $query = 'SELECT count(wc5m2_users.id) AS usersCounter , count(wc5m2_evaluations.id_users) AS evaluationsCounter '
            . 'FROM `wc5m2_users` '
            . 'LEFT JOIN `wc5m2_evaluations` '
            . 'On wc5m2_evaluations.id_users = wc5m2_users.id ';
        $queryPrepare = $this->db->query($query);

        /**
         *  Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
         */
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Méthode permettant de supprimer un utilisateur
     * Paramètres : id
     * @return objet
     */

    public function deleteUser()
    /**
     * La commande DELETE en SQL permet de supprimer des lignes dans une table.
     *En utilisant cette commande associé à WHERE il est possible de sélectionner les lignes concernées qui seront supprimées.
     */
    {
        $query = 'DELETE FROM `wc5m2_users` WHERE `id`= :id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

    public function mailDouble()
    {
        $query = 'SELECT   COUNT(*) AS emailCount
        FROM    `wc5m2_users`
        WHERE `email` = :email';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryPrepare->execute();
        $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $result->emailCount;
    }

    public function userDouble()
    {
        $query = 'SELECT   COUNT(*) AS nameCount
        FROM    `wc5m2_users`
        WHERE `name` = :name';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->execute();
        $result = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $result->nameCount;
    }

    /**
     * Méthode permettant de modifier un patient
     * Paramètres : lastname, firstname, birthdate, phone,  mail, id
     * @return objet
     */
    public function updateUser()
    {
        $query = 'UPDATE `wc5m2_users` '
            . 'SET `name` = :name, email=:email '
            . 'WHERE `id` = :id;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

    public function checkIfUserExists()
    {
        $query = 'SELECT COUNT(*) AS exist
        FROM wc5m2_users
        WHERE `name` = :name';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->execute();
        $queryResult = $queryPrepare->fetch(PDO::FETCH_OBJ);
        return $queryResult->exist;
    }
    // methode permettant de selectionner le mot de passe d'un utilisateur via son nom d'utilisateur
    public function selectPasswordByUsername()
    {
        $query = 'SELECT password
        FROM wc5m2_users
        WHERE `name`= :name';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }

    public function selectUserByName()
    {
        $query = 'SELECT id, id_roles 
        FROM wc5m2_users
        WHERE `name` = :name';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }

    public function selectUserById()
    {
        $query = 'SELECT `name`, email
        FROM wc5m2_users
        WHERE `id` = :id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetch(PDO::FETCH_OBJ);
    }
}
