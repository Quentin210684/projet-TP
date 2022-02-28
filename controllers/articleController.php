<?php

$articles = new articles;
$articles->id = $_GET['id'];
$articlesPress = $articles->getArticleById();

$evaluation = new evaluations;
$comment = new comments;
$comment->id_articles = $_GET['id'];
$commentList = $comment->getCommentsList();

foreach ($commentList as $ca){
    $comment->id_users=$ca->id_users;
    $commentListUsers = $comment->getCommentByUsers();
    $evaluation->id_users=$comment->id_users;
    $evaluationListUsers = $evaluation->getEvaluationsByUsers();
}



