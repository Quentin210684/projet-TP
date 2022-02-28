<?php

$game = new games;

if (!empty($_POST['deleteGame'])){
    $game->id = $_POST['deleteGame'];
    $game->deleteGame();
}

if (!empty($_POST['updateGame'])){
    $game->id = $_POST['updateGame'];
    $game->updateGame();
}

$gamesList = $game->getGamesListAdmin();

// var_dump($_POST);


