<?php 

    @session_start();

    require_once("conexao.php");

    //Preciso compara com o banco de dados para ver se tem o email e senha la

    $email      = $_POST['email'];
    $senha      = $_POST['senha'];
    $senha_crip = md5($senha);

    //PARA CONSULTAS NO BANCO
    $query           = $pdo->prepare("SELECT * FROM usuarios WHERE (email = :email or cpf = :email) AND senha_crip = :senha ");
   
    $query->bindValue(":email", $email);
    $query->bindValue(":senha", $senha_crip);
    $query->execute();

    $resultado_query = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD


    $total_registro  = count($resultado_query);

    if ($total_registro > 0) {

        //SE O USUARIO ESTIVER ATIVO ELE TEM ACESSO A HOME/PAINEL
        $ativo             = $resultado_query[0]['ativo'];  //RECUPERANDO O RESULTADO DA QUERY DE CONSULTA NO BD
       

        if ($ativo == "sim") {

            //SO VAI CRIAR ESSAS SESSOES SE O USUARIO ESTIVER ATIVO
            $_SESSION['id']    = $resultado_query[0]['id'];
            $_SESSION['nivel'] = $resultado_query[0]['nivel']; //$_SESSION serve P relacionar as informações dentro do BD
            $_SESSION['nome']  = $resultado_query[0]['nome']; 

            //VAI PARA O PAINEL HOME
            echo "<script>window.location='painel'</script>";
        }else{

            //CASO ESTEJA NAO ATIVO
            echo "<script>window.alert('Seu Usuário foi DESATIVADO, contate o Administrador ')</script>";
            echo "<script>window.location='index.php'</script>";   // REDIRECIONAMENTO //

        }

    }else{

        echo "<script>window.alert('Usuário ou Senha incorretos')</script>";
        echo "<script>window.location='index.php'</script>";   // REDIRECIONAMENTO //

    }

    echo $total_registro;
     
?>