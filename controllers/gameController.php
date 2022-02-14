<?php

$game = new games;
$game->id = $_GET['id'];
$game = $game->getGameById();
$languages = new languages;
$languagesList = $languages->selectLanguagesList();
$evaluation = new evaluations;
$evaluationList = $evaluation->getEvaluationsList();
$user = new users;
$usersList = $user->getUsersList();
