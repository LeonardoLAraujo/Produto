<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    class Produto{

        public $conexao;

        function __construct(){
            $this->conexao = Conexao::conectarNoBanco();
        }

        function cadastrarProduto($idUsuario, $nome, $descricao, $imagem){
            $sqlCadastrar = "INSERT INTO produtos(ID_USUARIO,NOME, DESCRICAO, IMAGEM) VALUES(
                            '{$idUsuario}', '{$nome}', '{$descricao}', '{$imagem}')";
            
            mysqli_query($this->conexao, $sqlCadastrar);
            mysqli_close($this->conexao);
        }

        function apagarProduto($id){
            $sqlRemoverProduto = "DELETE FROM produtos WHERE ID = '{$id}'";
            mysqli_query($this->conexao, $sqlRemoverProduto);
            mysqli_close($this->conexao);
        }

        function todosMeusProdutos($id){
            $sqlMeusProdutos = "SELECT * FROM produtos WHERE ID = '{$id}'";
            $resultado = mysqli_query($this->conexao, $sqlMeusProdutos);

            $produtos = array();

            while($produto = mysqli_fetch_assoc($resultado)){
                $produtos[] = $produto;
            }

            mysqli_close($this->conexao);

            return $produtos;
        }

        function alterarMeuProduto($id){
            $sqlAlterarProduto = "UPDATE produtos SET NOME = '{$_POST['nome']}', DESCRICAO = '{$_POST['descricao']}', IMAGEM = '{$_POST['imagem']}' WHERE ID = '{$id}'";
            mysqli_query($this->conexao, $sqlAlterarProduto);
            mysqli_close($this->conexao);
        }

    }

?>