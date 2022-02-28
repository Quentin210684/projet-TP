<?php

$comment = new comments;

if (!empty($_POST['deleteComment'])) {
    $comment->id = $_POST['deleteComment'];
    $comment->deleteComment();
}

var_dump($comment->deleteComment());


if (!empty($_POST['updateComment'])) {
    $comment->id = $_POST['updateComment'];
    $comment->updateComment();
}

$comment->id_users = $_SESSION['user']->id;
$commentList = $comment->getCommentListByUSerID();
