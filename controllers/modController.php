<?php

$mod = new mods;
$mod->id = $_GET['id'];
$modList = $mod->getModById();
$modListPage = $mod->getModsList();

$languages = new languages;
$languagesList = $languages->selectLanguagesList();

$comment = new comments;
$evaluation = new evaluations;
$evaluation->id_mods = $_GET['id'];
$evaluationList = $evaluation->getEvaluationsList();

foreach ($evaluationList as $e) {
    $evaluation->id_users = $e->id_users;
    $evaluationListUsers = $evaluation->getEvaluationsByUsers();

    $comment->id_users = $evaluation->id_users;
    $commentListUsers = $comment->getCommentByUsers();
}