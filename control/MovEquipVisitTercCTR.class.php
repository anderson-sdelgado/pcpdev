<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../model/MovEquipVisitTercDAO.class.php');
require_once('../model/MovEquipVisitTercPassagDAO.class.php');
/**
 * Description of MovVeicVisitTercCTR
 *
 * @author anderson
 */
class MovEquipVisitTercCTR {
        
    public function salvarMovVeicVisitTerc($body) {
        $idMovEquipVisitTercArray = array();
        $movEquipVisitTercArray = json_decode($body);
        foreach($movEquipVisitTercArray as $movEquipVisitTerc){
            $this->salvarMovEquipVisitTerc($movEquipVisitTerc);
            $this->salvarMovEquipVisitTercPassag($movEquipVisitTerc, $movEquipVisitTerc->movEquipVisitTercPassagList);
            $idMovEquipVisitTercArray[] = array("idMovEquipVisitTerc" => $movEquipVisitTerc->idMovEquipVisitTerc);
        }
        return $idMovEquipVisitTercArray;
    }

    private function salvarMovEquipVisitTerc($movEquipVisitTerc) {
        $movEquipVisitTercDAO = new MovEquipVisitTercDAO();
        $movEquipVisitTercDAO->insMovEquip($movEquipVisitTerc);
    }
  
    private function salvarMovEquipVisitTercPassag($movEquipVisitTerc, $dadosMovEquipVisitTercPassag) {
        $movEquipVisitTercPassagDAO = new MovEquipVisitTercPassagDAO();
        foreach ($dadosMovEquipVisitTercPassag as $movEquipVisitTercPassag) {
            $movEquipVisitTercPassagDAO->insMovEquipPassag($movEquipVisitTerc, $movEquipVisitTercPassag);
        }
    }
    
}
