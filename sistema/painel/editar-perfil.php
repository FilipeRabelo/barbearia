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
$senha_crip = md5($senha);

$foto = '';


// VERIFICAÇÕES

// VALIDAR SENHA
if ($senha != $conf_senha) {
    echo "As senhas são diferentes!!";
    exit(); // exit para nao deixar prosseguir
}

//VALIDAR EMAIL
$query           = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' ");
$resultado_query = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD

if (@count($resultado_query) > 0 && $id != $resultado_query[0]['id']) {
    echo "E-mail já cadastrado! Escolha outro!!";
    exit();
}

//VALIDAR CPF
$query           = $pdo->query("SELECT * FROM usuarios WHERE cpf = '$cpf' ");
$resultado_query = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD

if (@count($resultado_query) > 0 && $id != $resultado_query[0]['id']) {
    echo "CPF já cadastrado! Escolha outro!!";
    exit();
}



//ATUALIZAÇÃO UPDATE
//PREPARANDO O PREPARE 
$query           = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf, senha = :senha,
                                    senha_crip = '$senha_crip', endereco = :endereco, foto = '$foto' WHERE id = '$id' ");

//EXECUTANDO O PREPARE
//PASSANDO OS VALORES

//PODEMOS USAR bindValue OU bindParam
$query->bindValue(":nome", "$nome");  //O PARAMENTRO RECEBE A VARIAVEL Q FOI PASSADA
$query->bindValue(":email", "$email");
$query->bindValue(":telefone" , "$telefone");
$query->bindValue(":cpf", "$cpf");
$query->bindValue(":senha", "$senha");
$query->bindValue(":endereco", "$endereco");

$query->execute();

echo "Editado com Sucesso!!";   //MSG EXIBIDA APOS UPDATE TEM Q SER IGUAL A PASSADA NO AJAX //

?>