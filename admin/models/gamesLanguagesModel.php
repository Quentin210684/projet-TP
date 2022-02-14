<?php
class gamesLanguages extends database
{

    public $interface;
    public $audio;
    public $subtitles;
    public $id_games;
    private $db;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function selectGameLanguageList()
    {
        $query = 'SELECT interface, audio, subtitles, id_games  
    FROM wc5m2_gameslanguages';
        $queryPrepare = $this->db->query($query);
        return $queryPrepare->fetchAll(PDO::FETCH_OBJ);
    }
}