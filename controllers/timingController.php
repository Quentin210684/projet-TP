<?php

$game = new games;

$gameNew = $game->getGamesListHomeNews();


$comment = new comments;

$evaluation = new evaluations;
$evaluation->id_games = $_GET['id'];
$evaluationList = $evaluation->getEvaluationsList();
$evaluationNote = $evaluation->getEvaluationListHomeNote();


// boucle qui met permet d'aller rechercher id_user dans getEvaluationsList()
// ce qui permet de pouvoir compter le nombre d'avis laisser par un utilisateur.
foreach ($evaluationList as $e) {
    $evaluation->id_users = $e->id_users;
    $evaluationListUsers = $evaluation->getEvaluationsByUsers();

    $comment->id_users = $evaluation->id_users;
    $commentListUsers = $comment->getCommentByUsers();
}

