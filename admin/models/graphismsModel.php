<?php
class graphisms extends database
{

    public $id;
    public $name;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function selectGraphismsList()
    {
        $query = 'SELECT id, name 
    FROM wc5m2_graphisms';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}
