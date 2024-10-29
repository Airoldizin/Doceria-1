<?php
    if(isset($_POST['usuario']) && isset($_POST['senha'])){
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        Login::verificaLogin($login, $senha);
    }
?>

