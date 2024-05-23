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
class MovEquipProprioSegDAO extends OCIAPEX {

    public function insMovEquipSeg($movEquip, $movEquipSeg) {

        $sql = "INSERT INTO INTERFACE_PORTARIA_MOV_EQUIP_PROPRIO_SEG ("
                        . " ID "
                        . " , MOV_EQUIP_ID "
                        . " , EQUIP_ID "
                        . " , DTHR_CEL "
                        . " , NRO_APARELHO "
                        . " , CEL_ID "
                    . " ) "
                    . " VALUES ("
                        . " :id "
                        . " , :idMovEquip "
                        . " , :idEquip "
                        . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                        . " , :nroAparelho "
                        . " , :idCel "
                    . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idMovEquip", $movEquipSeg->idMovEquipProprio);
        oci_bind_by_name($result, ":idEquip", $movEquipSeg->idEquipMovEquipProprioSeg);
        oci_bind_by_name($result, ":id", $movEquipSeg->idMovEquipProprioSeg);
        oci_bind_by_name($result, ":idCel", $movEquip->idMovEquipProprio);
        oci_bind_by_name($result, ":dthr", $movEquip->dthrMovEquipProprio);
        oci_bind_by_name($result, ":nroAparelho", $movEquip->nroAparelhoMovEquipProprio);
        oci_execute($result);
        
    }

}
