<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../model/MovEquipResidenciaDAO.class.php');
/**
 * Description of MovVeicResidenciaCTR
 *
 * @author anderson
 */
class MovVeicResidenciaCTR {
    
    public function salvarMovVeicResidencia($info) {

        $dados = $info['dado'];

        $jsonObjEquipResidencia = json_decode($dados);

        $dadosEquipResidencia = $jsonObjEquipResidencia->movequipresidencia;

        return $this->salvarMovEquipResidencia($dadosEquipResidencia);

    }
    
    private function salvarMovEquipResidencia($dadosMovEquipResidencia) {
        
        $movEquipResidenciaDAO = new MovEquipResidenciaDAO();
        $idMovEquipResidenciaArray = array();
        
        foreach ($dadosMovEquipResidencia as $movEquipResidencia) {
            $v = $movEquipResidenciaDAO->verifMovEquip($movEquipResidencia);
            if ($v == 0) {
                $movEquipResidenciaDAO->insMovEquip($movEquipResidencia);
            }
            $idMovEquipResidenciaArray[] = array("idMovEquipResidencia" => $movEquipResidencia->idMovEquipResidencia);
        }
                
        $dadoMovEquipResidencia = array("movequipresidencia"=>$idMovEquipResidenciaArray);
        $retMovEquipResidencia = json_encode($dadoMovEquipResidencia);
        
        return 'MOVEQUIPRESIDENCIA_' . $retMovEquipResidencia;
    }
 
}
