<?php

require_once("../conexao.php");

$id         = $_POST['id'];
$nome       = $_POST['nome'];
$email      = $_POST['email'];
$telefone   = $_POST['telefone'];
$cpf        = $_POST['cpf'];
$senha      = $_POST['senha'];
$conf_senha = $_POST['conf_senha'];
$endereco   = $_POST['endereco'];


// VERIFICAÇÕES

// VALIDAR SENHA
if ($senha != $conf_senha) {
    echo "As senhas são diferentes!!";
    exit(); // exit para nao deixar prosseguir
}

//VALIDAR EMAIL
$query           = $conn->query("SELECT * FROM usuarios WHERE email = '$email' ");
$resultado_query = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD

if (@count($resultado_query) > 0 && $id != $resultado_query[0]['id']) {
    echo "E-mail já cadastrado! Escolha outro!!";
    exit();
}

//VALIDAR CPF
$query           = $conn->query("SELECT * FROM usuarios WHERE cpf = '$cpf' ");
$resultado_query = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD

if (@count($resultado_query) > 0 && $id != $resultado_query[0]['id']) {
    echo "CPF já cadastrado! Escolha outro!!";
    exit();
}


//ATUALIZAÇÃO UPDATE

$query           = $conn->prepare("UPDATE usuarios WHERE nome = ':nome' ");

?>