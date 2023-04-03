<?php

require_once('../control/MovEquipResidenciaCTR.class.php');

header('Content-type: application/json');
$body = file_get_contents('php://input');

if (isset($body)):

    $movEquipResidenciaCTR = new MovEquipResidenciaCTR();
    $idMovArray = $movEquipResidenciaCTR->salvarMovEquipResidencia($body);
    echo json_encode($idMovArray);

endif;
