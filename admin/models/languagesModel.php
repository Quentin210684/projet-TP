<?php
class languages extends database
{

    public $id;
    public $name;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function selectLanguagesList()
    {
        $query = 'SELECT id, name 
    FROM wc5m2_languages';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}
