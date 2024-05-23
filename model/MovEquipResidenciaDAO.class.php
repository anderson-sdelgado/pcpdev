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
class MovEquipResidenciaDAO extends OCIAPEX {

    public function insMovEquip($movEquip) {

        $sql = "INSERT INTO INTERFACE_PORTARIA_MOV_EQUIP_RESIDENCIA ("
                                        . " ID "
                                        . " , DTHR "
                                        . " , DTHR_CEL "
                                        . " , DTHR_TRANS "
                                        . " , TIPO "
                                        . " , LOCAL_ID "
                                        . " , MATRIC_RESP "
                                        . " , NOME_VISITANTE "
                                        . " , VEICULO "
                                        . " , PLACA "
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
                                        . " , :matricVigia "
                                        . " , :nomeVisitante "
                                        . " , :veiculo "
                                        . " , :placa "
                                        . " , :observacao "
                                        . " , :nroAparelho "
                                    . " )";
        
        $this->OCI = parent::getConn();
        $result = oci_parse($this->OCI, $sql);
        oci_bind_by_name($result, ":dthr", $movEquip->dthrMovEquipResidencia);
        oci_bind_by_name($result, ":tipo", $movEquip->tipoMovEquipResidencia);
        oci_bind_by_name($result, ":idLocal", $movEquip->idLocalMovEquipResidencia);
        oci_bind_by_name($result, ":matricVigia", $movEquip->nroMatricVigiaMovEquipResidencia);
        oci_bind_by_name($result, ":nomeVisitante", $movEquip->nomeVisitanteMovEquipResidencia);
        oci_bind_by_name($result, ":veiculo", $movEquip->veiculoMovEquipResidencia);
        oci_bind_by_name($result, ":placa", $movEquip->placaMovEquipResidencia);
        oci_bind_by_name($result, ":observacao", $movEquip->observMovEquipResidencia);
        oci_bind_by_name($result, ":idCel", $movEquip->idMovEquipResidencia);
        oci_bind_by_name($result, ":nroAparelho", $movEquip->nroAparelhoMovEquipResidencia);
        oci_execute($result);
        
    }

}
