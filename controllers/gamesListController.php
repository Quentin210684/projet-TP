<?php

$game = new games;
// $game->id = $_GET['id'];

$types = new types;
$typesList = $types->selectTypesList();


$graphism = new graphisms;
$graphismsList = $graphism->selectGraphismsList();

$platforms = new platforms;
$platformsList = $platforms->selectPlatformsList();


// Récupérer le nombre d'enregistrements
$count = $game->countGamesPages();


// Pagination
$page = (!empty($_GET['page']) ? $_GET['page'] : 1);

$game->limit = 6;

$pageNumber = ceil($count / $game->limit);
$game->offset = ($page - 1) * $game->limit;


if (!empty($_POST['search'])) {
    $game->title = $_POST['search'];
    $gamesList = $game->getGamesSearchList();
} else {
    $gamesList = $game->getGamesList();
}

if( $_GET['page']>$pageNumber){
    header('Location: page404.php');
    exit;
}
// for ($i = 1; $i <= $pageNumber; $i++) {
//     echo "<a href='?page=$i'>$i</a>";
// }

