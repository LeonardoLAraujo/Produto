<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    header("Access-Control-Allow-Origin:* ");
    header("Access-Control-Allow-Headers:* ");
    header("Access-Control-Allow-Methods:* ");

    require_once("conexao.php");
    

    class Usuario{

        function todosUsuarios($conexao){
            $sqlUsuario = "SELECT * FROM usuarios";
            $resultado = mysqli_query($conexao, $sqlUsuario);

            $usuarios = array();

            while($usuario = mysqli_fetch_assoc($resultado)){
                $usuarios[] = $usuario;
            }
          
            return $usuarios;   
        }

        function autenticandoUsuario($conexao){

            $usuarios = $this->todosUsuarios($conexao);

            foreach($usuarios as $user){
                if($user['EMAIL'] == $_POST['email'] && $user['SENHA'] == $_POST['password']){
                    $_SESSION['uidUsuario'] = $user['ID'];
                    $_SESSION['autenticado'] = "sim";
                }else{
                    header("Location: ../index.html?login=error");
                }
            }
        }

        function encontrarUsuarioPeloEmail($conexao){
            
            $sqlEncontrarUsuarioPeloEmail = "SELECT * FROM usuarios WHERE EMAIL = '{$_POST['email']}'";
            $resultado = mysqli_query($conexao, $sqlEncontrarUsuarioPeloEmail);

            $usuarios = array();

            while($usuario = mysqli_fetch_assoc($resultado)){
                $usuarios[] = $usuario;
            }

            $uidUsuario = $usuarios[0]['ID'];

            $this->alterarSenhaUsuario($conexao, $uidUsuario);
        }

        function alterarSenhaUsuario($conexao, $id){
            $sqlAlterarSenha = "UPDATE usuarios SET SENHA = '{$_POST['password']}' WHERE ID = '{$id}'";
            mysqli_query($conexao, $sqlAlterarSenha);
        }

    }



?>