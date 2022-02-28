<?php

$evaluation = new evaluations;

if (!empty($_POST['deleteEvaluation'])) {
    $evaluation->id = $_POST['deleteEvaluation'];
    $evaluation->deleteEvaluation();
}

if (!empty($_POST['updateEvaluation'])){
    $evaluation->id = $_POST['updateEvaluation'];
    $evaluation->updateEvaluation();
}
$evaluation->id_users=$_SESSION['user']->id;
$evaluationList = $evaluation->getEvaluationsListByUSerID();
