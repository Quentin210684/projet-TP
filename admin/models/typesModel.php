<?php
class types extends database
{

    public $id;
    public $name;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    // public function getGamesNavListType()
    // {
    //     $query = 'SELECT * FROM wc5m2_types
    //     WHERE name = `:name` OR id = :id';
    //     $queryPrepare = $this->db->prepare($query);
    //     $queryPrepare->bindValue(':name', $this->name, PDO::PARAM_INT);
    //     $queryPrepare->bindValue(':id', $this->id, PDO::PARAM_STR);
    //     return $queryPrepare->execute();
    // }


    public function selectTypesList()
    {
        $query = 'SELECT id, name 
    FROM wc5m2_types';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}
