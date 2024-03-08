<?php

    header("Access-Control-Allow-Origin:* ");
    header("Access-Control-Allow-Headers:* ");
    header("Access-Control-Allow-Methods:* ");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("./conexao.php");
    require_once("./produto.php");

    $produto = new Produto;
    $produto->apagarProduto($_GET['id']);
    header("Location: ../view/meusProdutos.php?success=yes");

?>