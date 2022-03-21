<?php
// J'instancie mon objet- j'appelle ma classe
$user = new users;
$game = new games;
$comment = new comments;
$user = $user->countUsersList();
$game = $game->countGamesList();
$comment = $comment->countCommentList();