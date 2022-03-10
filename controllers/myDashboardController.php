<?php
$user = new users;

$user->id = $_SESSION['user']->id;
if (isset($_POST['deleteUser'])) {

    $user->deleteUser();
    // rediriger vers logOut.php quand l'utilisateur à supprimer sa cession
    header('location:logOut.php');
    exit;
}

$user = $user->selectUserById();
// var_dump($_POST);
