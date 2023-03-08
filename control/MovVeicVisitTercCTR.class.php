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
class MovVeicVisitTercCTR {
    
    public function salvarMovVeicVisitTerc($info) {

        $dados = $info['dado'];
        $array = explode("_", $dados);

        $jsonObjMovEquipVisitTerc = json_decode($array[0]);
        $jsonObjMovEquipVisitTercPassag = json_decode($array[1]);

        $dadosMovEquipVisitTerc = $jsonObjMovEquipVisitTerc->movequipvisitterc;
        $dadosMovEquipVisitTercPassag = $jsonObjMovEquipVisitTercPassag->movequipvisittercpassag;

        return $this->salvarMovEquipVisitTerc($dadosMovEquipVisitTerc, $dadosMovEquipVisitTercPassag);

    }
    
    private function salvarMovEquipVisitTerc($dadosMovEquipVisitTerc, $dadosMovEquipVisitTercPassag) {
        
        $idMovEquipVisitTercArray = array();
        $idMovEquipVisitTercPassagArray = array();
        $movEquipVisitTercDAO = new MovEquipVisitTercDAO();
        
        foreach ($dadosMovEquipVisitTerc as $movEquipVisitTerc) {
            $v = $movEquipVisitTercDAO->verifMovEquip($movEquipVisitTerc);
            if ($v == 0) {
                $movEquipVisitTercDAO->insMovEquip($movEquipVisitTerc);
            }
            $idMovEquipVisitTercBD = $movEquipVisitTercDAO->idMovEquip($movEquipVisitTerc);
            $idMovEquipVisitTercPassagArray = $this->salvarMovEquipVisitTercPassag($idMovEquipVisitTercBD, $movEquipVisitTerc->idMovEquipVisitTerc, $dadosMovEquipVisitTercPassag);
            $idMovEquipVisitTercArray[] = array("idMovEquipVisitTerc" => $movEquipVisitTerc->idMovEquipVisitTerc);
        }
        
        $dadoMovEquipVisitTerc = array("movequipvisitterc"=>$idMovEquipVisitTercArray);
        $retMovEquipVisitTerc = json_encode($dadoMovEquipVisitTerc);
        
        $dadoMovEquipVisitTercPassag = array("movequipvisittercpassag"=>$idMovEquipVisitTercPassagArray);
        $retMovEquipVisitTercPassag = json_encode($dadoMovEquipVisitTercPassag);
        
        return 'MOVEQUIPVISITTERC_' . $retMovEquipVisitTerc . '_' . $retMovEquipVisitTercPassag;
    }
  
    private function salvarMovEquipVisitTercPassag($idMovEquipProprioBD, $idMovEquipProprioCel, $dadosMovEquipVisitTercPassag) {
        
        $idMovEquipVisitTercPassagArray = array();
        $movEquipVisitTercPassagDAO = new MovEquipVisitTercPassagDAO();
        
        foreach ($dadosMovEquipVisitTercPassag as $movEquipVisitTercPassag) {
            if ($idMovEquipProprioCel == $movEquipVisitTercPassag->idMovEquipVisitTerc) {
                $v = $movEquipVisitTercPassagDAO->verifMovEquipPassag($idMovEquipProprioBD, $movEquipVisitTercPassag);
                if ($v == 0) {
                    $movEquipVisitTercPassagDAO->insMovEquipPassag($idMovEquipProprioBD, $movEquipVisitTercPassag);
                }
            }
            $idMovEquipVisitTercPassagArray[] = array("idMovEquipVisitTercPassag" =>$movEquipVisitTercPassag->idMovEquipVisitTercPassag);
        }

        return $idMovEquipVisitTercPassagArray;
        
    }
    
}
