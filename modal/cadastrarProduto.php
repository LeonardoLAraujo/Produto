<?php

    header("Access-Control-Allow-Origin:* ");
    header("Access-Control-Allow-Headers:* ");
    header("Access-Control-Allow-Methods:* ");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("./conexao.php");
    require_once("./produto.php");

    $cadastrar = new Produto;
    $cadastrar->cadastrarProduto($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['imagem']);
    header('Location: ../view/cadastrarProduto.php?sucesso=yes');

?>