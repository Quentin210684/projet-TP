<?php
$user = new users;
$mod = new mods;

if (!empty($_POST['deleteMod'])) {
    $mod->id = $_POST['deleteMod'];
    $mod->deleteMod();
}

if (!empty($_POST['updateMod'])) {
    $mod->id = $_POST['updateMod'];
    $mod->updateMod();
}

$modList = $mod->getModsList();
// var_dump($mod->deleteMod());