<?php

    @session_start();

    $banco = 'barbearia';
    $usuario = 'root';
    $senha = '';
    $servidor = 'localhost';

    date_default_timezone_set('America/Sao_Paulo');

    try {
        $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
    } catch (Exception $e) {
        echo 'Não conectado ao Banco de Dados! <br><br>' . $e;
    }

   //VARIAVEIS DO SISTEMA 
   $nome_sistema  = "Barbearia Pelo Longo";
   $email_sistema = "filipe@bithive.com.br";
  

?>