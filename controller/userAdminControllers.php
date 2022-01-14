<?php

$user = new users;

if (!empty($_POST['deleteUser'])){
    $user->id = $_POST['deleteUser'];
    $user->deleteUser();
}

$usersList = $user->getUsersList();





?>

