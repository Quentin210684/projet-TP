<?php

$game = new games;
// $game->id = $_GET['id'];
$gamesList = $game->getGamesList();
$types = new types;
$typesList = $types->selectTypesList();


$graphism = new graphisms;
$graphismsList = $graphism->selectGraphismsList();

$platforms = new platforms;
$platformsList = $platforms->selectPlatformsList();

