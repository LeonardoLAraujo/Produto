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

    $user = new Usuario;
    echo $user->autenticandoUsuario($conexao);
    mysqli_close($conexao);

    header("Location: ../view/principal.php");
?>  