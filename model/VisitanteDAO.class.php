<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of VisitanteDAO
 *
 * @author anderson
 */
class VisitanteDAO extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados() {

        $select = " SELECT " 
                            . " VISITANTES_ID AS \"idVisitante\" "
                            . " , DECODE(CD_IDENT, NULL, PK_SF_UTIL.FKG_MASCARA_CPF(CPF), CD_IDENT) AS \"cpfVisitante\" "
                            . " , NOM_VIS AS NOME_VISITANTE AS \"nomeVisitante\" "
                        . " FROM "
                            . " VISITANTES ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
