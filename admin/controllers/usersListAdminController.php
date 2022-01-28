<?php

$user = new users;


if (!empty($_POST['updateUser'])){
    $user->id = $_POST['updateUser'];
    $user->updateUser();
}

if (!empty($_POST['deleteUser'])){
    $user->id = $_POST['deleteUser'];
    $user->deleteUser();
}



$usersList = $user->getUsersList();





?>

