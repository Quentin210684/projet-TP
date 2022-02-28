<?php
$game = new games;
$games = $game->getGamesListAdmin();
$articles = new articles;

$articlesList = $articles->getArticleList();