<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCIAPEX.class.php');
/**
 * Description of MovEquipVisitTercPassagDAO
 *
 * @author anderson
 */
class MovEquipVisitTercPassagDAO extends OCIAPEX {

    public function insMovEquipPassag($movEquip, $movEquipPassag) {

        $sql = "INSERT INTO INTERFACE_PORTARIA_MOV_EQUIP_VISIT_TERC_PASSAG ("
                        . " ID "
                        . " , MOV_EQUIP_ID "
                        . " , VISIT_TERC_ID "
                        . " , DTHR_CEL "
                        . " , NRO_APARELHO "
                        . " , CEL_ID "
                    . " ) "
                    . " VALUES ("
                        . " :id "
                        . " , :idMovEquip "
                        . " , :idVisitTerc "
                        . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                        . " , :nroAparelho "
                        . " , :idCel "
                    . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idMovEquip", $movEquipPassag->idMovEquipVisitTercPassag);
        oci_bind_by_name($result, ":idVisitTerc", $movEquipPassag->idVisitTercMovEquipVisitTercPassag);
        oci_bind_by_name($result, ":id", $movEquipPassag->idMovEquipVisitTerc);
        oci_bind_by_name($result, ":idCel", $movEquip->idMovEquipVisitTerc);
        oci_bind_by_name($result, ":dthr", $movEquip->dthrMovEquipVisitTerc);
        oci_bind_by_name($result, ":nroAparelho", $movEquip->nroAparelhoMovEquipVisitTerc);
        oci_execute($result);
        
    }

}
