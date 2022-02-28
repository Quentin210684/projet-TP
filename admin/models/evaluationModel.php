<?php

class Evaluations extends database
{

    public $id;
    public $content;
    public $rating;
    public $date;
    public $id_mods;
    public $id_games;
    public $id_users;
    public $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }


    public function addEvaluation()
    {
        $query = 'INSERT INTO `wc5m2_evaluations` (`content`, `rating`, `date`, `id_mods`, `id_games`, `id_users`) 
        VALUES (:content, :rating, NOW() , :id_mods, :id_games, :id_users);';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryPrepare->bindValue(':rating', $this->rating, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_mods', $this->id_mods, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_games', $this->id_games, PDO::PARAM_INT);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);

        return $queryPrepare->execute();
    }

    public function getEvaluationsList() 
    {
        /** 
         * INNER JOIN permet de mettre 2 tables en commun
         * ON c'est la condition pour le mettre en commun
         */
        $query = 'SELECT  wc5m2_evaluations.id, `content`, `rating`, `date`,name,id_users
        FROM `wc5m2_evaluations`
        INNER JOIN wc5m2_users ON wc5m2_evaluations.id_users = wc5m2_users.id
        INNER JOIN wc5m2_games ON wc5m2_evaluations.id_games = wc5m2_games.id
        -- INNER JOIN wc5m2_articles ON wc5m2_evaluations.id_games = wc5m2_articles.id
        WHERE id_games=:id_games';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_games', $this->id_games, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }

    public function getEvaluationsByUsers()
    {
        /** 
         * INNER JOIN permet de mettre 2 tables en commun
         * ON c'est la condition pour le mettre en commun
         */
        $query = 'SELECT COUNT(*) as evaluationCount
        FROM `wc5m2_evaluations`
        WHERE id_users =:id_users
        GROUP BY id_users;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }


    public function getEvaluationsListByUSerID()
    {
        /** 
         * LEFT JOIN permet de mettre 2 tables en commun + toute la table evaluation + la table game en commun avec evaluation
         * ON c'est la condition pour le mettre en commun
         */
        $query = 'SELECT wc5m2_evaluations.id, `content`, `rating`, `date`, `id_mods`, id_games, picture
        FROM `wc5m2_evaluations`
        LEFT JOIN wc5m2_games ON wc5m2_evaluations.id_games = wc5m2_games.id
        WHERE id_users =:id_users';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $queryPrepare->execute();
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ); 
    }

    public function deleteEvaluation()
    /**
     * La commande DELETE en SQL permet de supprimer des lignes dans une table.
     *En utilisant cette commande associé à WHERE il est possible de sélectionner les lignes concernées qui seront supprimées.
     */
    {
        $query = 'DELETE FROM `wc5m2_evaluations` WHERE `id`= :id';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }

    public function updateEvaluation()
    {
        $query = 'UPDATE `wc5m2_evaluations` SET `content`=:content,`rating`=:rating, `date`=NOW()
        WHERE id=:id ;';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryPrepare->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryPrepare->bindValue(':rating', $this->rating, PDO::PARAM_INT);
        return $queryPrepare->execute();
    }
}
