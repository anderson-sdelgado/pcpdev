<?php

require_once('../control/MovEquipProprioCTR.class.php');

header('Content-type: application/json');
$body = file_get_contents('php://input');

if (isset($body)):

    $movEquipProprioCTR = new MovEquipProprioCTR();
    $idMovArray = $movEquipProprioCTR->salvarMovEquipProprio($body);
    echo json_encode($idMovArray);
    
endif;
