<?php

    session_start();

    header("Access-Control-Allow-Origin:* ");
    header("Access-Control-Allow-Headers:* ");
    header("Access-Control-Allow-Methods:* ");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("../modal/conexao.php");

    $conexao = Conexao::conectarNoBanco();

    $id = $_SESSION['uidUsuario'];

    $sqlMeusProdutos = "SELECT * FROM produtos WHERE ID_USUARIO = '{$id}'";
    $resultado = mysqli_query($conexao, $sqlMeusProdutos);

    $meusProdutos = array();

    while($produto = mysqli_fetch_assoc($resultado)){
        $meusProdutos[] = $produto;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Produtos</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/meusProdutos.css">
    <script src="../js/cadastrarProduto.js" defer></script>
</head>
<body>

    <div class="modalApagarProduto">
        <p>Produto Apagado com Sucesso</p>
    </div>

    <div class="modalAtualizarProduto">
        <p>Produto Atualizado com Sucesso</p>
    </div>

    <main id="principal">
        <a class="voltar" href="./principal.php">Voltar</a>
        <h1>Meus Produtos</h1>
        <?php foreach($meusProdutos as $produto) : ?>
            <div class="card">
                <div>
                    <img src=<?php echo $produto['IMAGEM'] ?>>
                </div>
                <div class="prod">
                    <div class="info_prod">
                        <h2><?php echo $produto['ID'] ?></h2>
                        <h2><?php echo $produto['NOME'] ?></h2>
                    </div>
                    <p><?php echo $produto['DESCRICAO'] ?></p>
                    <div class="linksAlteracoes">
                        <a class="apagarProduto" href="./alterarProduto.php?id=<?php echo $produto['ID']; ?>">Alterar Produto</a>
                        <a class="apagarProduto" href="../modal/apagarProduto.php?id=<?php echo $produto['ID']; ?>">Apagar Produto</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
    
</body>
</html>