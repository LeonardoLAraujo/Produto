<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    header("Access-Control-Allow-Origin:* ");
    header("Access-Control-Allow-Headers:* ");
    header("Access-Control-Allow-Methods:* ");

    require_once("conexao.php");
    require_once("./usuario.php");
    $conexao = Conexao::conectarNoBanco();
    
    $usuario = new Usuario;
    $usuario->encontrarUsuarioPeloEmail($conexao);
    header("Location: ../index.html?success=yes");

?>