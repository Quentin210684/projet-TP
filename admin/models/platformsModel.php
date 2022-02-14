<?php
class platforms extends database
{

    public $id;
    public $name;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function selectPlatformsList()
    {
        $query = 'SELECT id, name 
    FROM wc5m2_platforms';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}
