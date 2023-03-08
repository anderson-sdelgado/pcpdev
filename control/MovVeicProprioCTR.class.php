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
class MovVeicProprioCTR {
    
    public function salvarMovVeicProprio($info) {
        
        $dados = $info['dado'];
        $array = explode("_", $dados);

        $jsonObjMovEquipProprio = json_decode($array[0]);
        $jsonObjMovEquipProprioSeg = json_decode($array[1]);
        $jsonObjMovEquipProprioPassag = json_decode($array[2]);
        
        $dadosMovEquipProprio = $jsonObjMovEquipProprio->movequipproprio;
        $dadosMovEquipProprioSeg = $jsonObjMovEquipProprioSeg->movequipproprioseg;
        $dadosMovEquipProprioPassag = $jsonObjMovEquipProprioPassag->movequippropriopassag;

        return $this->salvarMovEquipProprio($dadosMovEquipProprio, $dadosMovEquipProprioSeg, $dadosMovEquipProprioPassag);

    }
    
    private function salvarMovEquipProprio($dadosMovEquipProprio, $dadosMovEquipProprioSeg, $dadosMovEquipProprioPassag) {
        
        $idMovEquipProprioArray = array();
        $idMovEquipProprioSegArray = array();
        $idMovEquipProprioPassagArray = array();
        $movEquipProprioDAO = new MovEquipProprioDAO();
        
        foreach ($dadosMovEquipProprio as $movEquipProprio) {
            $v = $movEquipProprioDAO->verifMovEquip($movEquipProprio);
            if ($v == 0) {
                $movEquipProprioDAO->insMovEquip($movEquipProprio);
            }
            $idMovEquipProprioBD = $movEquipProprioDAO->idMovEquip($movEquipProprio);
            $idMovEquipProprioSegArray = $this->salvarMovEquipProprioSeg($idMovEquipProprioBD, $movEquipProprio->idMovEquipProprio, $dadosMovEquipProprioSeg);
            $idMovEquipProprioPassagArray = $this->salvarMovEquipProprioPassag($idMovEquipProprioBD, $movEquipProprio->idMovEquipProprio, $dadosMovEquipProprioPassag);
            $idMovEquipProprioArray[] = array("idMovEquipProprio" => $movEquipProprio->idMovEquipProprio);
        }
                
        $dadoMovEquipProprio = array("movequipproprio"=>$idMovEquipProprioArray);
        $retMovEquipProprio = json_encode($dadoMovEquipProprio);
        
        $dadoMovEquipProprioSeg = array("movequipproprioseg"=>$idMovEquipProprioSegArray);
        $retMovEquipProprioSeg = json_encode($dadoMovEquipProprioSeg);
        
        $dadoMovEquipProprioPassag = array("movequippropriopassag"=>$idMovEquipProprioPassagArray);
        $retMovEquipProprioPassag = json_encode($dadoMovEquipProprioPassag);
        
        return 'MOVEQUIPPROPRIO_' . $retMovEquipProprio . '_' . $retMovEquipProprioSeg . '_' . $retMovEquipProprioPassag;
    }

    private function salvarMovEquipProprioSeg($idMovEquipProprioBD, $idMovEquipProprioCel, $dadosMovEquipProprioSeg) {
        
        $idMovEquipProprioSegArray = array();
        $movEquipProprioSegDAO = new MovEquipProprioSegDAO();
        
        foreach ($dadosMovEquipProprioSeg as $movEquipProprioSeg) {
            if ($idMovEquipProprioCel == $movEquipProprioSeg->idMovEquipProprio) {
                $v = $movEquipSegProprioDAO->verifMovEquipSeg($idMovEquipProprioBD, $movEquipProprioSeg);
                if ($v == 0) {
                    $movEquipSegProprioDAO->insMovEquipSeg($idMovEquipProprioBD, $movEquipProprioSeg);
                }
            }
            $idMovEquipProprioSegArray[] = array("idMovEquipProprioSeg" =>$movEquipProprioSeg->idMovEquipProprioSeg);
        }

        return $idMovEquipProprioSegArray;
        
    }
 
    private function salvarMovEquipProprioPassag($idMovEquipProprioBD, $idMovEquipProprioCel, $dadosMovEquipProprioPassag) {
        
        $idMovEquipProprioPassagArray = array();
        $movEquipProprioPassagDAO = new MovEquipProprioPassagDAO();
        
        foreach ($dadosMovEquipProprioPassag as $movEquipProprioPassag) {
            if ($idMovEquipProprioCel == $movEquipProprioPassag->idMovEquipProprio) {
                $v = $movEquipProprioPassagDAO->verifMovEquipPassag($idMovEquipProprioBD, $movEquipProprioPassag);
                if ($v == 0) {
                    $movEquipProprioPassagDAO->insMovEquipPassag($idMovEquipProprioBD, $movEquipProprioPassag);
                }
            }
            $idMovEquipProprioPassagArray[] = array("idMovEquipProprioPassag" =>$movEquipProprioPassag->idMovEquipProprioPassag);
        }

        return $idMovEquipProprioPassagArray;
        
    }
    
}
