<?php

    session_start();

    $banco    = "barbearia";
    $usuario  = "root";
    $senha    = "";
    $servidor = "localhost";

    date_default_timezone_set("America/Sao_Paulo");

    try {

        $conn = new PDO("mysql:host={$servidor};dbname={$banco}", $usuario, $senha); //CLASSE RESPONSAVEL PELA CONEXAO COM O BANCO DE DADOS
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ATRIBUTOS PARA HABILITAR OS ERROS do PDO
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    } catch (PDOException $e) {

        print "Erro: " . $e->getMessage() . "<br/>";   //SE DER ERRO NA CONEXÃO 
        die();
    }

   //VARIAVEIS DO SISTEMA 
   $nome_sistema  = "Barbearia Pelo Longo";
   $email_sistema = "barbeariaPeloLongo@bithive.com.br";
  

?>