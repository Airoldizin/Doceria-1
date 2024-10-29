<?php
include_once 'database/DB.php';

class Usuario {
    private $idusuario;
    private $login;
    private $senha;
    
    function __construct() {}
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function autenticaUsuario($login, $senha) {
        $query = "SELECT * FROM usuario WHERE login = '$login' AND senha = PASSWORD('$senha')";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado === 1;
        
        if(count($resultado) === 1){
            return $resultado;
        }else{
            return 0;
        }
    }
    
}
