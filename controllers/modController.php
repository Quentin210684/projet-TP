<?php

$mod = new mods;
$mod->id = $_GET['id'];
$modList = $mod->getModById();