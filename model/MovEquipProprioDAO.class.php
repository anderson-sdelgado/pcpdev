<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/ConnAPEX.class.php');
/**
 * Description of MovEquipProprioDAO
 *
 * @author anderson
 */
class MovEquipProprioDAO extends OCIAPEX {

    public function verifMovEquip($movEquip) {

        $select = " SELECT "
                        . " COUNT(*) AS QTDE "
                    . " FROM "
                        . " MOV_EQUIP_PORTARIA "
                    . " WHERE "
                        . " DTHR_CEL = TO_DATE('" . $movEquip->dthrMovEquipProprio . "','DD/MM/YYYY HH24:MI')"
                        . " AND "
                        . " EQUIP_ID = " . $movEquip->idEquipMovEquipProprio;

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            foreach ($row as $item) {
                $v = $item[0];
            }
        }

        return $v;
    }

    public function idMovEquip($movEquip) {

        $select = " SELECT "
                        . " ID AS ID "
                    . " FROM "
                        . " MOV_EQUIP_PORTARIA "
                    . " WHERE "
                        . " DTHR_CEL = TO_DATE('" . $movEquip->dthrMovEquipProprio . "' , 'DD/MM/YYYY HH24:MI')"
                        . " AND "
                        . " EQUIP_ID = " . $movEquip->idEquipMovEquipProprio;

        $this->Conn = parent::getConn();
        $stid = oci_parse($this->Conn, $select);
        oci_execute($stid);

        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            foreach ($row as $item) {
                $v = $item[0];
            }
        }

        return $v;
    }

    public function insMovEquip($movEquip) {
//
//        if ($movEquip->descrDestinoMovEquipProprio != 'null') {
//            $movEquip->descrDestinoMovEquipProprio = "'" . str_replace(array("#", "'", ";", "*", "%", "$", "@", "!", "{", "}", "[", "]", "(", ")"), '', $movEquip->descrDestinoMovEquipProprio) . "'";
//        }
//        
//        if ($movEquip->nroNotaFiscalMovEquipProprio == 0) {
//            $movEquip->nroNotaFiscalMovEquipProprio = 'null';
//        }
//        
//        if ($movEquip->observacaoMovEquipProprio != 'null') {
//            $movEquip->observacaoMovEquipProprio = "'" . str_replace(array("#", "'", ";", "*", "%", "$", "@", "!", "{", "}", "[", "]", "(", ")"), '', $movEquip->observacaoMovEquipProprio) . "'";
//        } else {
//            $movEquip->observacaoMovEquipProprio = 'null';
//        }

        $sql = "INSERT INTO MOV_EQUIP_PORTARIA ("
                            . " DTHR "
                            . " , DTHR_CEL "
                            . " , DTHR_TRANS "
                            . " , TIPO "
                            . " , EQUIP_ID "
                            . " , MATRIC_RESP "
                            . " , MATRIC_COLAB "
                            . " , DESTINO "
                            . " , NOTA_FISCAL "
                            . " , OBSERVACAO "
                        . " ) "
                        . " VALUES ("
                            . " TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , :tipo "
                            . " , :idEquip "
                            . " , :matricVigia "
                            . " , :matricColab "
                            . " , :descrDestino "
                            . " , :nroNF "
                            . " , :observacao "
                        . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":dthr", $movEquip->dthrInicialCabecViagem);
        oci_bind_by_name($result, ":tipo", $movEquip->tipoMovEquipProprio);
        oci_bind_by_name($result, ":idEquip", $movEquip->idEquipMovEquipProprio);
        oci_bind_by_name($result, ":matricVigia", $movEquip->nroMatricVigiaMovEquipProprio);
        oci_bind_by_name($result, ":matricColab", $movEquip->nroMatricColabMovEquipProprio);
        oci_bind_by_name($result, ":descrDestino", $movEquip->descrDestinoMovEquipProprio);
        oci_bind_by_name($result, ":nroNF", $movEquip->nroNotaFiscalMovEquipProprio);
        oci_bind_by_name($result, ":observacao", $movEquip->observacaoMovEquipProprio);
        oci_execute($result);
        
    }

}
