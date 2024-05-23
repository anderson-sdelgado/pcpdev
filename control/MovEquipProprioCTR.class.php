<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../model/MovEquipProprioDAO.class.php');
require_once('../model/MovEquipProprioSegDAO.class.php');
require_once('../model/MovEquipProprioPassagDAO.class.php');
/**
 * Description of MovVeicProprioCTR
 *
 * @author anderson
 */
class MovEquipProprioCTR {
    
    public function salvarMovEquipProprio($body) {
        $idMovEquipProprioArray = array();
        $movEquipProprioArray = json_decode($body);
        foreach($movEquipProprioArray as $movEquipProprio){
            $this->salvarMovEquip($movEquipProprio);
            $this->salvarMovEquipSeg($movEquipProprio, $movEquipProprio->movEquipProprioSegList);
            $this->salvarMovEquipPassag($movEquipProprio, $movEquipProprio->movEquipProprioPassagList);
            $idMovEquipProprioArray[] = array("idMovEquipProprio" => $movEquipProprio->idMovEquipProprio);
        }
        return json_encode($idMovEquipProprioArray, JSON_NUMERIC_CHECK);
    }
    
    private function salvarMovEquip($movEquipProprio) {
        $movEquipProprioDAO = new MovEquipProprioDAO();
        $movEquipProprioDAO->insMovEquip($movEquipProprio);
    }

    private function salvarMovEquipSeg($movEquipProprio, $dadosMovEquipProprioSeg) {
        $movEquipProprioSegDAO = new MovEquipProprioSegDAO();
        foreach ($dadosMovEquipProprioSeg as $movEquipProprioSeg) {
            $movEquipProprioSegDAO->insMovEquipSeg($movEquipProprio, $movEquipProprioSeg);
        }
    }
 
    private function salvarMovEquipPassag($movEquipProprio, $dadosMovEquipProprioPassag) {
        $movEquipProprioPassagDAO = new MovEquipProprioPassagDAO();
        foreach ($dadosMovEquipProprioPassag as $movEquipProprioPassag) {
            $movEquipProprioPassagDAO->insMovEquipPassag($movEquipProprio, $movEquipProprioPassag);
        }
    }
    
}
