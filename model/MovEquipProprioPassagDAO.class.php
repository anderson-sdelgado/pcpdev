<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCIAPEX.class.php');
/**
 * Description of MovEquipProprioPassagDAO
 *
 * @author anderson
 */
class MovEquipProprioPassagDAO extends OCIAPEX {

    public function insMovEquipPassag($movEquip, $movEquipPassag) {

        $sql = "INSERT INTO INTERFACE_PORTARIA_MOV_EQUIP_PROPRIO_PASSAG ("
                        . " ID "
                        . " , MOV_EQUIP_ID "
                        . " , NRO_MATRIC_PASSAG "
                        . " , DTHR_CEL "
                        . " , NRO_APARELHO "
                        . " , CEL_ID "
                    . " ) "
                    . " VALUES ("
                        . " :id "
                        . " , :idMovEquip "
                        . " , :nroMatric "
                        . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                        . " , :nroAparelho "
                        . " , :idCel "
                    . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idMovEquip", $movEquipPassag->idMovEquipProprio);
        oci_bind_by_name($result, ":nroMatric", $movEquipPassag->nroMatricMovEquipProprioPassag);
        oci_bind_by_name($result, ":id", $movEquipPassag->idMovEquipProprioPassag);
        oci_bind_by_name($result, ":idCel", $movEquip->idMovEquipProprio);
        oci_bind_by_name($result, ":dthr", $movEquip->dthrMovEquipProprio);
        oci_bind_by_name($result, ":nroAparelho", $movEquip->nroAparelhoMovEquipProprio);
        oci_execute($result);
        
    }

}
