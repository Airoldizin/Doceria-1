<?php
class Receita{
    private $idreceita;
    private $nome;
    
    function __construct() {}
    
    public function __get($param) {
        return $this->$param;
    }
    
    public function __set($param,$value) {
        $this->$param = $value;
    }
}
?>
