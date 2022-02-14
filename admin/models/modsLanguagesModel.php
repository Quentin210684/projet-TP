<?php
class modsLanguages extends database
{

    public $interface;
    public $audio;
    public $subtitles;
    public $id_mods;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function selectModLanguageList()
    {
        $query = 'SELECT interface, audio, subtitles, id_mods  
    FROM wc5m2_modslanguages';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}