<?php

    header("Access-Control-Allow-Origin:* ");
    header("Access-Control-Allow-Headers:* ");
    header("Access-Control-Allow-Methods:* ");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("../modal/conexao.php");
    require_once("../modal/produto.php");

   $produto = new Produto;
   $produtos = array();
   $produtos = $produto->todosMeusProdutos($_GET['id']);
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/produto.css">
</head>
<body>
    
    <main>
        <a class="voltar" href="./meusProdutos.php">Voltar</a>
        <h1>Atualizar Produto</h1>
        <form action="../modal/alterarProduto.php" method="post">
            <input type="hidden" name="id" value=<?php echo $produtos[0]['ID'] ?> />
            <input type="text" name="nome" placeholder="Nome" value=<?php echo $produtos[0]['NOME'] ?>>
            <input type="text" name="descricao" placeholder="Descrição" value=<?php echo $produtos[0]['DESCRICAO'] ?>>
            <input type="text" name="imagem" placeholder="Imagem" value=<?php echo $produtos[0]['IMAGEM'] ?>>
            <button type="submit">Atualizar</button>
        </form>
    </main>

</body>
</html>