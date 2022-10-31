<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../model/ColabDAO.class.php');
require_once('../model/EquipDAO.class.php');
require_once('../model/TerceiroDAO.class.php');
require_once('../model/VisitanteDAO.class.php');
/**
 * Description of BaseDadosCTR
 *
 * @author anderson
 */
class BaseDadosCTR {

    public function dadosColab() {

        $colabDAO = new ColabDAO();

        $dados = array("dados" => $colabDAO->dados());
        $retJson = json_encode($dados);

        return $retJson;

    }
    
    public function dadosEquip() {

        $equipDAO = new EquipDAO();

        $dados = array("dados" => $equipDAO->dados());
        $retJson = json_encode($dados);

        return $retJson;

    }
    
    public function dadosTerceiro() {

        $terceiroDAO = new TerceiroDAO();

        $dados = array("dados" => $terceiroDAO->dados());
        $retJson = json_encode($dados);

        return $retJson;

    }
    
    public function dadosVisitante() {

        $visitanteDAO = new VisitanteDAO();

        $dados = array("dados" => $visitanteDAO->dados());
        $retJson = json_encode($dados);

        return $retJson;

    }
    
}
