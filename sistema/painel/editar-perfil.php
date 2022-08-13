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

///////////////////////////////////////////////////////////////

//VALIDAR TROCA DA FOTO
$query = $pdo->query("SELECT * FROM usuarios where id = '$id'");   //VERIFICA O USUARIO E TRAZ O TOTAL DE REGISTRO
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
    $foto = $res[0]['foto'];  //SELECIONAOU O USUARIO ELE VAI RECUPERAR O CAMPO FOTO DELE
} else {
    $foto = 'sem-foto.jpg';  //ATENTAR PELA EXTENSAO DA FOTO (ARQUIVO)
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') . '-' . @$_FILES['foto']['name'];  //foto é o name do input
$nome_img = preg_replace('/[ :]+/', '-', $nome_img);

$caminho = 'img/perfil/' . $nome_img;  //caminho qeu vai ser inserida

$imagem_temp = @$_FILES['foto']['tmp_name'];

if (@$_FILES['foto']['name'] != "") {
    $ext = pathinfo($nome_img, PATHINFO_EXTENSION);
    if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif') {  //somente extensao de imagem

        //SE TIVER EDITANDO ELE EXCLUI A FOTO ANTERIOR
        //EXCLUO A FOTO ANTERIOR
        if ($foto != "sem-foto.jpg") {
            @unlink('img/perfil/' . $foto);  //ele tira a foto fora
        }

        $foto = $nome_img; // e colcoa a foto nova

        move_uploaded_file($imagem_temp, $caminho);
    } else {
        echo 'Extensão de Imagem não permitida!';
        exit();
    }
}
//FIM SCRIPT PARA SUBIR FOTO NO SERVIDOR



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