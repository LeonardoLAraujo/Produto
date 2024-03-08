<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("../controller/validaAcesso.php");
    require_once("../modal/conexao.php");

    $conexao = Conexao::conectarNoBanco();

    $id = $_SESSION['uidUsuario'];

    $sqlUser = "SELECT * FROM usuarios WHERE ID = {$id}";
    $resultado = mysqli_query($conexao, $sqlUser);

    $user = array();

    while($res = mysqli_fetch_assoc($resultado)){
        $user[] = $res;
    }

    $nome = $user[0]['NOME'];
    $email = $user[0]['EMAIL'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Tela</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/principal.css">
</head>
<body>

    <a class="voltar" href="../controller/logout.php">Sair</a>

    <main id="principal">
        <h1>Bem Vindo De Volta, <?php echo $nome ?></h1>
        <div class="card">
            <h2>Cadastrar Produto</h2>
            <a href="./cadastrarProduto.php">Cadastrar Produto</a>
        </div>
        <div>
            <h2>Ver Produtos</h2>
            <a href="./meusProdutos.php">Meus Produtos</a>
        </div>
    </main>

</body>
</html>