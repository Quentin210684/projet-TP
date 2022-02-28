<?php

$articles = new articles;

if (!empty($_POST['deleteArticle'])){
    $articles->id = $_POST['deleteArticle'];
    $articles->deleteArticle();
}

if (!empty($_POST['updateArticle'])){
    $articles->id = $_POST['updateArticle'];
    $articles->updateArticle();
}

$articlesList = $articles->getArticleList(); 