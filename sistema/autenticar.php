<?php 

    require_once("conexao.php");

    //Preciso compara com o banco de dados para ver se tem o email e senha la

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //PARA CONSULTAS NO BANCO
    $query           = $conn->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = $senha ");
    $resultado_query = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD

    $total_registro  = count($resultado_query);

    if ($total_registro > 0) {
        //VAI PARA O PAINEL HOME
        echo "<script>window.location='painel'</script>";

    }else{

        echo "<script>window.alert('Usuário ou Senha incorretos')</script>";
        echo "<script>window.location='index.php'</script>";   //REDIRECIONAMENTO

    }

    echo $total_registro;
     
?>