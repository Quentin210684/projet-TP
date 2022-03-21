<?php


if (!empty($_GET['search'])) {
    require_once '../admin/models/database.php';
    require_once '../admin/models/gamesModel.php';
    $game = new games();
    $game->title = $_GET['search'];
    echo json_encode($game->searchOpinion());
}

