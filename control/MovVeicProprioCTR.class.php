<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../model/MovEquipProprioDAO.class.php');
require_once('../model/MovEquipSegProprioDAO.class.php');
/**
 * Description of MovVeicProprioCTR
 *
 * @author anderson
 */
class MovVeicProprioCTR {
    
    public function salvarMovVeicProprio($info) {

        $dados = $info['dado'];

        $posicao = strpos($dados, "_") + 1;
        $movEquipProprio = substr($dados, 0, ($posicao - 1));
        $movEquipSegProprio = substr($dados, $posicao);

        $jsonObjMovEquipProprio = json_decode($movEquipProprio);
        $jsonObjMovEquipSegProprio = json_decode($movEquipSegProprio);

        $dadosMovEquipProprio = $jsonObjMovEquipProprio->movequipproprio;
        $dadosMovEquipSegProprio = $jsonObjMovEquipSegProprio->movequipsegproprio;

        return $this->salvarMovEquipProprio($dadosMovEquipProprio, $dadosMovEquipSegProprio);

    }
    
    private function salvarMovEquipProprio($dadosMovEquipProprio, $dadosMovEquipSegProprio) {
        
        $movEquipProprioDAO = new MovEquipProprioDAO();
        $idMovEquipProprioArray = array();
        
        foreach ($dadosMovEquipProprio as $movEquipProprio) {
            $v = $movEquipProprioDAO->verifMovEquip($movEquipProprio);
            if ($v == 0) {
                $movEquipProprioDAO->insMovEquip($movEquipProprio);
            }
            $idMovEquipProprioBD = $movEquipProprioDAO->idMovEquip($movEquipProprio);
            $this->salvarPassageiro($idMovEquipProprioBD, $movEquipProprio->idMovEquipProprio, $dadosMovEquipSegProprio);
            $idMovEquipProprioArray[] = array("idMovEquipProprio" => $movEquipProprio->idMovEquipProprio);
        }
                
        $dadoMovEquipProprio = array("movequipproprio"=>$idMovEquipProprioArray);
        $retMovEquipProprio = json_encode($dadoMovEquipProprio);
        
        return 'MOVEQUIPPROPRIO_' . $retMovEquipProprio;
    }

    private function salvarMovEquipSegProprio($idMovEquipProprioBD, $idMovEquipProprioCel, $dadosMovEquipSegProprio) {
        
        $movEquipSegProprioDAO = new MovEquipSegProprioDAO();
        
        foreach ($dadosMovEquipSegProprio as $movEquipSegProprio) {
            if ($idMovEquipProprioCel == $movEquipSegProprio->idMovEquipProprio) {
                $v = $movEquipSegProprioDAO->verifMovEquipSeg($idMovEquipProprioBD, $movEquipSegProprio);
                if ($v == 0) {
                    $movEquipSegProprioDAO->insMovEquipSeg($idMovEquipProprioBD, $movEquipSegProprio);
                }
            }
        }

    }
 
}
