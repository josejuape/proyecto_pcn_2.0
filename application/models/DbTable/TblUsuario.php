<?php

class Application_Model_DbTable_TblUsuario extends Zend_Db_Table_Abstract
{
    protected $_name="usuario";
    protected $_primary="idusuario";
    
    public function getAll()
    {
        return $this->fetchAll();
    }
    
    public function getRow($user,$clave)
    {
        $row=$this->fetchAll("user='".$user."' and clave='".$clave."'");
        return $row;
    }
    
}
