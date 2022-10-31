<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/ConnAPEX.class.php');
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
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        foreach ($result as $item) {
            $v = $item['QTDE'];
        }

        return $v;
    }

    public function insMovEquip($movEquip) {

        if ($movEquip->placaMovEquipVisitTerc != 'null') {
            $movEquip->placaMovEquipVisitTerc = "'" . str_replace(array("#", "'", ";", "*", "%", "$", "@", "!", "{", "}", "[", "]", "(", ")"), '', $movEquip->placaMovEquipVisitTerc) . "'";
        }
        
        if ($movEquip->veiculoMovEquipVisitTerc != 'null') {
            $movEquip->veiculoMovEquipVisitTerc = "'" . str_replace(array("#", "'", ";", "*", "%", "$", "@", "!", "{", "}", "[", "]", "(", ")"), '', $movEquip->veiculoMovEquipVisitTerc) . "'";
        }
        
        if ($movEquip->destinoMovEquipVisitTerc != 'null') {
            $movEquip->destinoMovEquipVisitTerc = "'" . str_replace(array("#", "'", ";", "*", "%", "$", "@", "!", "{", "}", "[", "]", "(", ")"), '', $movEquip->destinoMovEquipVisitTerc) . "'";
        } else {
            $movEquip->destinoMovEquipVisitTerc = 'null';
        }
        
        if ($movEquip->observacaoMovEquipVisitTerc != 'null') {
            $movEquip->observacaoMovEquipVisitTerc = "'" . str_replace(array("#", "'", ";", "*", "%", "$", "@", "!", "{", "}", "[", "]", "(", ")"), '', $movEquip->observacaoMovEquipVisitTerc) . "'";
        } else {
            $movEquip->observacaoMovEquipVisitTerc = 'null';
        }
        
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
                        . " TO_DATE('" . $movEquip->dthrMovEquipVisitTerc . "' , 'DD/MM/YYYY HH24:MI')"
                        . " , TO_DATE('" . $movEquip->dthrMovEquipVisitTerc . "' , 'DD/MM/YYYY HH24:MI')"
                        . " , SYSDATE "
                        . " , " . $movEquip->tipoMovEquipVisitTerc
                        . " , " . $movEquip->idVisitTercMovEquipVisitTerc
                        . " , " . $movEquip->tipoVisitTercMovEquipVisitTerc
                        . " , " . $movEquip->nroMatricVigiaMovEquipProprio
                        . " , " . $movEquip->placaMovEquipVisitTerc
                        . " , " . $movEquip->veiculoMovEquipVisitTerc
                        . " , " . $movEquip->destinoMovEquipVisitTerc
                        . " , " . $movEquip->observacaoMovEquipVisitTerc
                    . " )";

        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($sql);
        $this->Create->execute();
    }

}
