<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCIAPEX.class.php');
/**
 * Description of MovEquipVisitTercDAO
 *
 * @author anderson
 */
class MovEquipVisitTercDAO extends OCIAPEX {

    public function insMovEquip($movEquip) {

        $sql = "INSERT INTO INTERFACE_PORTARIA_MOV_EQUIP_VISIT_TERC ("
                                . " ID "
                                . " , DTHR "
                                . " , DTHR_CEL "
                                . " , DTHR_TRANS "
                                . " , TIPO "
                                . " , LOCAL_ID "
                                . " , VISIT_TERC_ID "
                                . " , VISIT_TERC_TIPO "
                                . " , MATRIC_RESP "
                                . " , VEICULO "
                                . " , PLACA "
                                . " , DESTINO "
                                . " , OBSERVACAO "
                                . " , NRO_APARELHO "
                            . " )"
                            . " VALUES ("
                                . " :idCel "
                                . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                                . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                                . " , SYSDATE "
                                . " , :tipo "
                                . " , :idLocal "
                                . " , :idVisitTerc "
                                . " , :tipoVisitTerc "
                                . " , :matricVigia "
                                . " , :veiculo "
                                . " , :placa "
                                . " , :destino "
                                . " , :observacao "
                                . " , :nroAparelho "
                            . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idCel", $movEquip->idMovEquipVisitTerc);
        oci_bind_by_name($result, ":dthr", $movEquip->dthrMovEquipVisitTerc);
        oci_bind_by_name($result, ":tipo", $movEquip->tipoMovEquipVisitTerc);
        oci_bind_by_name($result, ":idLocal", $movEquip->idLocalMovEquipVisitTerc);
        oci_bind_by_name($result, ":idVisitTerc", $movEquip->idVisitTercMovEquipVisitTerc);
        oci_bind_by_name($result, ":tipoVisitTerc", $movEquip->tipoVisitTercMovEquipVisitTerc);
        oci_bind_by_name($result, ":matricVigia", $movEquip->nroMatricVigiaMovEquipVisitTerc);
        oci_bind_by_name($result, ":veiculo", $movEquip->veiculoMovEquipVisitTerc);
        oci_bind_by_name($result, ":placa", $movEquip->placaMovEquipVisitTerc);
        oci_bind_by_name($result, ":destino", $movEquip->destinoMovEquipVisitTerc);
        oci_bind_by_name($result, ":observacao", $movEquip->observMovEquipVisitTerc);
        oci_bind_by_name($result, ":nroAparelho", $movEquip->nroAparelhoMovEquipVisitTerc);
        oci_execute($result);
        
    }

}
