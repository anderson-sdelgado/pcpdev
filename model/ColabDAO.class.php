<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of ColabDAO
 *
 * @author anderson
 */
class ColabDAO extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados() {

        $select = " SELECT "
                        . " COLAB.CD AS \"matricColab\" "
                        . " , CORR.NOME AS \"nomeColab\" "
                    . " FROM "
                        . " COLAB COLAB "
                        . " , CORR CORR "
                        . " , REG_DEMIS DEM "
                    . " WHERE"
                        . " COLAB.CD > 10000 "
                        . " AND "
                        . " DEM.COLAB_ID IS NULL "
                        . " AND " 
                        . " COLAB.COLAB_ID = DEM.COLAB_ID(+) "
                        . " AND "
                        . " COLAB.CORR_ID = CORR.CORR_ID "
                    . " ORDER BY COLAB.CD ASC ";

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
        
    }
    
}
