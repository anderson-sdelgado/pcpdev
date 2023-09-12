<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../control/AtualAplicCTR.class.php');
require_once('../model/ColabDAO.class.php');
require_once('../model/EquipDAO.class.php');
require_once('../model/LocalDAO.class.php');
require_once('../model/TerceiroDAO.class.php');
require_once('../model/VisitanteDAO.class.php');
/**
 * Description of BaseDadosCTR
 *
 * @author anderson
 */
class BaseDadosCTR {

    public function dadosColab($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){
        
            $colabDAO = new ColabDAO();

            $dados = array("dados" => $colabDAO->dados());
            $retJson = json_encode($dados);

            return $retJson;
        
        }

    }
    
    public function dadosEquip($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){
        
            $equipDAO = new EquipDAO();

            $dados = array("dados" => $equipDAO->dados());
            $retJson = json_encode($dados);

            return $retJson;
        
        }
    }
        
    public function dadosLocal($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){
        
            $localDAO = new LocalDAO();

            $dados = array("dados" => $localDAO->dados());
            $retJson = json_encode($dados);

            return $retJson;
        
        }

    }
    
    public function dadosTerceiro($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){
        
            $terceiroDAO = new TerceiroDAO();

            $dados = array("dados" => $terceiroDAO->dados());
            $retJson = json_encode($dados);

            return $retJson;
                
        }
        
    }
    
    public function dadosVisitante($info) {

        $atualAplicCTR = new AtualAplicCTR();
        
        if($atualAplicCTR->verifToken($info)){
        
            $visitanteDAO = new VisitanteDAO();

            $dados = array("dados" => $visitanteDAO->dados());
            $retJson = json_encode($dados);

            return $retJson;

        }
        
    }
    
}
