<?php

require_once('../control/MovEquipProprioCTR.class.php');
require_once('../control/AtualAplicCTR.class.php');

$headers = getallheaders();
header('Content-type: application/json');
$body = file_get_contents('php://input');;

if (!array_key_exists('Authorization', $headers)) {
    echo json_encode(["error" => "Authorization header is missing"]);
    exit;
}

if (!isset($body)){
    echo json_encode(["error" => "Empty body"]);
    exit;
}

$atualAplicCTR = new AtualAplicCTR();
if (!$atualAplicCTR->verToken($headers)){
    echo json_encode(["error" => "Invalid token"]);
    exit;
}

$movEquipProprioCTR = new MovEquipProprioCTR();
$idMovArray = $movEquipProprioCTR->salvarMovEquipProprio($body);
echo json_encode($idMovArray);
