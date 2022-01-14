
<?php
class users
{

    public $id;
    public $name;
    public $email;
    public $password;
    public $starred;
    public $blocked;
    public $id_roles;

    public function __construct()
    {
        try {
            return $this->db = new PDO('mysql:host=localhost; dbname=gamescreening; charset=UTF8', 'root', '2108171229');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    /**
     * Méthode permettant d'ajouter un utilisateur dans la base de données.
     * Paramètres : name, email, password, starred, blocked
     * @return objet
     */
    public function addUser()
    {
        $query = 'INSERT INTO `wc5m2_users`(`id`, `name`, `email`,`password`,`starred`,`blocked`,`id_roles`) '
            . 'VALUES (:id, :name, :email, :password, 0, 0, 2);';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryPrepare->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryPrepare->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $queryPrepare->execute();
    }

    /**
     * Méthode permettant de récupérer un utilisateur
     * Paramètres : id
     * @return objet
     */

    public function getUsersList()
    {
        $query = 'SELECT `id`, `name`, `email`, `starred`, `blocked`, `id_roles` '
            . 'FROM `wc5m2_users`';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Méthode permettant de supprimer un utilisateur
     * Paramètres : id
     * @return objet
     */

    public function deleteUser()
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

    
}















/**
 * Méthode permettant de récupérer le nombre de patient grâce à son mail
 * Paramètres : mail
 * @return objet
 */

// public function checkIfPatientExistsByMail() {
//     $query = 'SELECT COUNT(*) AS `exists` '
//             . 'FROM `patients` '
//             . 'WHERE `mail` = :mail';
//     $queryPrepare = $this->db->prepare($query);
//     $queryPrepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
//     $queryPrepare->execute();
//     return $queryPrepare->fetch(PDO::FETCH_OBJ);
// }

/**
 * Méthode permettant de récupérer la liste des patients
 * Paramètres : aucun
 * @return objet
 */

// public function getPatientsList() {
//     $query = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` '
//             . 'FROM `patients`';
//     $queryExecute = $this->db->query($query);
//     return $queryExecute->fetchAll(PDO::FETCH_OBJ);
// }

/**
 * Méthode permettant de récupérer un patient grâce à son id
 * Paramètres : id
 * @return objet
 */

// public function getPatientProfileById() {
//     $query = 'SELECT `lastname`, `firstname`, `birthdate`, DATE_FORMAT(`birthdate`,\'%d/%m/%Y\') as `birthdate_fr`, `phone`, `mail` '
//             . 'FROM `patients` WHERE `id` = :id';
//     $queryPrepare = $this->db->prepare($query);
//     $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
//     $queryPrepare->execute();
//     return $queryPrepare->fetch(PDO::FETCH_OBJ);
// }

/**
 * Méthode permettant de récupérer le nombre de patient grâce à son id
 * Paramètres : id
 * @return objet
 */

// public function checkIfPatientExistsById() {
//     $query = 'SELECT COUNT(*) AS `exists` '
//             . 'FROM `patients` '
//             . 'WHERE `id` = :id';
//     $queryPrepare = $this->db->prepare($query);
//     $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
//     $queryPrepare->execute();
//     return $queryPrepare->fetch(PDO::FETCH_OBJ);
// }

/**
 * Méthode permettant de modifier un patient
 * Paramètres : lastname, firstname, birthdate, phone,  mail, id
 * @return objet
 */

    // public function updatePatient() {
    //     $query = 'UPDATE `patients` '
    //             . 'SET `lastname` = UPPER(:lastname),`firstname` = :firstname,`birthdate` = :birthdate,`phone` = :phone,`mail` = :mail '
    //             . 'WHERE `id` = :id';
    //     $queryPrepare = $this->db->prepare($query);
    //     $queryPrepare->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    //     $queryPrepare->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    //     $queryPrepare->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
    //     $queryPrepare->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    //     $queryPrepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    //     $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $queryPrepare->execute();
    // }
