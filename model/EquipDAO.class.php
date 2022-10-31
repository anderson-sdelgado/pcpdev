<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of EquipDAO
 *
 * @author anderson
 */
class EquipDAO extends Conn {
    //put your code here

    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados() {

        $select = " SELECT " 
                        . " E.EQUIP_ID AS \"idEquip\" "
                        . " , E.NRO_EQUIP AS \"nroEquip\" "
                    . " FROM "
                        . " EQUIP E "
                        . " , MODELO_EQUIP ME "
                        . " , CLASSE_OPER CO "
                    . " WHERE "
                        . " ME.MODELEQUIP_ID = E.MODELEQUIP_ID "
                        . " AND " 
                        . " CO.CLASSOPER_ID = E.CLASSOPER_ID "
                    . " ORDER BY E.NRO_EQUIP ASC ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
