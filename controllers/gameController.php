<?php

$game = new games;
$game->id = $_GET['id'];
$game = $game->getGameById();

$languages = new languages;
$languagesList = $languages->selectLanguagesList();


$comment = new comments;
$evaluation = new evaluations;
$evaluation->id_games = $_GET['id'];
$evaluationList = $evaluation->getEvaluationsList();
// boucle qui met permet d'aller rechercher id_user dans getEvaluationsList()
// ce qui permet de pouvoir compter le nombre d'avis laisser par un utilisateur.
foreach ($evaluationList as $e) {
    $evaluation->id_users = $e->id_users;
    $evaluationListUsers = $evaluation->getEvaluationsByUsers();

    $comment->id_users = $evaluation->id_users;
    $commentListUsers = $comment->getCommentByUsers();
}
