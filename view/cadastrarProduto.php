<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    header("Access-Control-Allow-Origin:* ");
    header("Access-Control-Allow-Headers:* ");
    header("Access-Control-Allow-Methods:* ");

    require_once("../controller/validaAcesso.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/produto.css">
    <script src="../js/cadastrarProduto.js" defer></script>
</head>
<body>
    
    <div class="modalCadastrado">
        <p>Cadastrado com Sucesso!</p>
    </div>

    <main>
        <a class="voltar" href="./principal.php">Voltar</a>
        <h1>Cadastrar Produto</h1>
        <form action="../modal/cadastrarProduto.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_SESSION['uidUsuario'] ?>">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="descricao" placeholder="Descrição">
            <input type="text" name="imagem" placeholder="Imagem">
            <button type="submit">Enviar</button>
        </form>
    </main>

</body>
</html>