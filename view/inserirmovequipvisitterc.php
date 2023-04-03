<?php

require_once('../control/MovEquipVisitTercCTR.class.php');

header('Content-type: application/json');
$body = file_get_contents('php://input');

if (isset($body)):

    $movEquipVisitTercCTR = new MovEquipVisitTercCTR();
    $idMovArray = $movEquipVisitTercCTR->salvarMovEquipVisitTerc($body);
    echo json_encode($idMovArray);

endif;
