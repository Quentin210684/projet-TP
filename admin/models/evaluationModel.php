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
        VALUES (:content, :rating, now(), :id_mods, :id_games, :id_users);';
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
        $query = 'SELECT `id`, `content`, `rating`, `date`, `id_mods`, id_games, id_users '
        . 'FROM `wc5m2_evaluations`';
    $queryPrepare = $this->db->query($query);
    return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }





}
