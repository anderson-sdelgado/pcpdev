<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCIAPEX.class.php');
/**
 * Description of MovEquipSegProprioDAO
 *
 * @author anderson
 */
class MovEquipSegProprioDAO extends OCIAPEX {

    public function verifMovEquipSeg($idMovEquipProprioBD, $movEquip) {

        $select = " SELECT "
                        . " COUNT(*) AS QTDE "
                    . " FROM "
                        . " PORTARIA_MOV_EQUIP_SEG "
                    . " WHERE "
                        . " MOV_EQUIP_ID = " . $idMovEquipProprioBD
                        . " AND "
                        . " EQUIP_ID = " . $movEquip->idEquipMovEquipSegProprio;

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'QTDE');
        }

        oci_free_statement($stid);
        return $v;
        
    }

    public function insMovEquipSeg($idMovEquipProprioBD, $movEquip) {

        $sql = "INSERT INTO PORTARIA_MOV_EQUIP_SEG ("
                        . " MOV_EQUIP_ID "
                        . " , EQUIP_ID "
                    . " ) "
                    . " VALUES ("
                        . " :movEquipId "
                        . " , :equipId "
                    . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":movEquipId", $idMovEquipProprioBD);
        oci_bind_by_name($result, ":equipId", $movEquip->idEquipMovEquipSegProprio);
        oci_execute($result);
        
    }

}
