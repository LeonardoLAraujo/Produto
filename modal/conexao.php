<?php

    class Conexao{

        public static function conectarNoBanco($banco = "meuBanco"){
            $bdServidor = 'localhost';
            $bdUsuario  = 'Usuario';
            $bdSenha    = 'minhaSenha';

            $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $banco);
            mysqli_set_charset($conexao, 'utf8');

            if(!$conexao){
                echo "Erro ao conectar com o Banco de Dados";
                die();
            }

            return $conexao;
        }

    }

?>