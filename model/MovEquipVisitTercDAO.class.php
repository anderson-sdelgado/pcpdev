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

    public function verifMovEquip($movEquip) {

        $select = " SELECT "
                        . " COUNT(*) AS QTDE "
                    . " FROM "
                        . " MOV_EQUIP_TERC_PORTARIA "
                    . " WHERE "
                        . " DTHR_CEL = TO_DATE('" . $movEquip->dthrMovEquipVisitTerc . "','DD/MM/YYYY HH24:MI')"
                        . " AND "
                        . " ID_VISITANTE_TERCEIRO = " . $movEquip->idVisitTercMovEquipVisitTerc;

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while (oci_fetch($stid)) {
            $v = oci_result($stid, 'QTDE');
        }

        oci_free_statement($stid);
        return $v;
    }

    public function insMovEquip($movEquip) {

        $sql = "INSERT INTO MOV_EQUIP_TERC_PORTARIA ("
                        . " DTHR "
                        . " , DTHR_CEL "
                        . " , DTHR_TRANS "
                        . " , TIPO "
                        . " , ID_VISITANTE_TERCEIRO "
                        . " , TIPO_VISITANTE_TERCEIRO "
                        . " , MATRIC_RESP "
                        . " , PLACA "
                        . " , VEICULO "
                        . " , DESTINO "
                        . " , OBSERVACAO "
                    . " )"
                    . " VALUES ("
                        . " TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                        . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                        . " , SYSDATE "
                        . " , :tipo "
                        . " , :idVisitTerc "
                        . " , :tipoVisitTerc "
                        . " , :matricVigia "
                        . " , :placa "
                        . " , :veiculo "
                        . " , :destino "
                        . " , :observacao "
                    . " )";
        
        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":dthr", $movEquip->dthrMovEquipVisitTerc);
        oci_bind_by_name($result, ":tipo", $movEquip->tipoMovEquipVisitTerc);
        oci_bind_by_name($result, ":idVisitTerc", $movEquip->idVisitTercMovEquipVisitTerc);
        oci_bind_by_name($result, ":tipoVisitTerc", $movEquip->tipoVisitTercMovEquipVisitTerc);
        oci_bind_by_name($result, ":matricVigia", $movEquip->nroMatricVigiaMovEquipVisitTerc);
        oci_bind_by_name($result, ":placa", $movEquip->placaMovEquipVisitTerc);
        oci_bind_by_name($result, ":veiculo", $movEquip->veiculoMovEquipVisitTerc);
        oci_bind_by_name($result, ":destino", $movEquip->destinoMovEquipVisitTerc);
        oci_bind_by_name($result, ":observacao", $movEquip->observacaoMovEquipVisitTerc);
        oci_execute($result);
        
    }

}
