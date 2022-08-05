<?php

    require_once("conexao.php");

    $email = $_POST['email'];

    $query           = $conn->query("SELECT * FROM usuarios WHERE email = '$email' ");
    $resultado_query = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD
    $total_registro  = count($resultado_query);

    if ($total_registro > 0) {

        $senha = $resultado_query[0]["senha"];

        //ENVIO DO EMAIL

        $destinatario = $email;
        $assunto      = $nome_sistema . " - Recuperação de Senha";
        $mensagem     = "Sua senha é: " . $senha;
        $cabecalhos   = "From: " . $email_sistema;  //REMETENTE

        @mail($destinatario, $assunto, $mensagem, $cabecalhos);   //NAO FUNCIONA NO LOCALHOST, SOMENTE NO SERVIDOR ONLINE

        echo "Recuperado com Sucesso";

    }else{
        echo "Esse Email não está cadastrado";
    }

?>