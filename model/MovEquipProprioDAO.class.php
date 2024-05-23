<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/OCIAPEX.class.php');
/**
 * Description of MovEquipProprioDAO
 *
 * @author anderson
 */
class MovEquipProprioDAO extends OCIAPEX {

    public function insMovEquip($movEquip) {

        $sql = "INSERT INTO INTERFACE_PORTARIA_MOV_EQUIP_PROPRIO ("
                            . " ID "
                            . " , DTHR "
                            . " , DTHR_CEL "
                            . " , DTHR_TRANS "
                            . " , TIPO "
                            . " , EQUIP_ID "
                            . " , LOCAL_ID "
                            . " , MATRIC_RESP "
                            . " , MATRIC_COLAB "
                            . " , DESTINO "
                            . " , NOTA_FISCAL "
                            . " , OBSERVACAO "
                            . " , NRO_APARELHO "
                        . " ) "
                        . " VALUES ("
                            . " :idCel "
                            . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                            . " , TO_DATE(:dthr , 'DD/MM/YYYY HH24:MI')"
                            . " , SYSDATE "
                            . " , :tipo "
                            . " , :idEquip "
                            . " , :idLocal "
                            . " , :matricVigia "
                            . " , :matricColab "
                            . " , :destino "
                            . " , :nroNF "
                            . " , :observacao "
                            . " , :nroAparelho "
                        . " )";

        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":idCel", $movEquip->idMovEquipProprio);
        oci_bind_by_name($result, ":dthr", $movEquip->dthrMovEquipProprio);
        oci_bind_by_name($result, ":tipo", $movEquip->tipoMovEquipProprio);
        oci_bind_by_name($result, ":idLocal", $movEquip->idLocalMovEquipProprio);
        oci_bind_by_name($result, ":idEquip", $movEquip->idEquipMovEquipProprio);
        oci_bind_by_name($result, ":matricVigia", $movEquip->nroMatricVigiaMovEquipProprio);
        oci_bind_by_name($result, ":matricColab", $movEquip->nroMatricColabMovEquipProprio);
        oci_bind_by_name($result, ":destino", $movEquip->destinoMovEquipProprio);
        oci_bind_by_name($result, ":nroNF", $movEquip->nroNotaFiscalMovEquipProprio);
        oci_bind_by_name($result, ":observacao", $movEquip->observMovEquipProprio);
        oci_bind_by_name($result, ":nroAparelho", $movEquip->nroAparelhoMovEquipProprio);
        oci_execute($result);
        
    }

}
