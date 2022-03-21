<?php
// J'instancie mon objet- j'appelle ma classe
$articles = new articles;
/**
 * 1 - Je vérifie que ma variable existe ET n'est pas vide. La fonction empty() -  vérifie ces deux conditions, pas besoin de compléter avec isset()
 * Cette condition est faisable aussi pour un champs non-obligatoire, il faut juste supprimer le else (pas d'erreur si le champs n'est pas rempli)
 * Les autres vérifications pour ce champs doivent se faire dans cette condition, il ne faut pas vérifier si une varible correspond à une regex s'il n'y a rien dedans
 * Si ça n'existe pas je crée un message d'erreur adapté
 */
if (!empty($_POST['deleteArticle'])) {
    $articles->id = $_POST['deleteArticle'];
    $articles->deleteArticle();
}

if (!empty($_POST['updateArticle'])) {
    $articles->id = $_POST['updateArticle'];
    $articles->updateArticle();
}

$articlesList = $articles->getArticleList();
