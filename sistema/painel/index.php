<?php 

    @session_start();  
    
    require_once("verificar.php");
    require_once("../conexao.php");


    echo $_SESSION['nivel'] . '<br><br>';

    $data = [
        $_SESSION['id'],
        $_SESSION['nome'],
        $_SESSION['nivel'],
    ];

    echo"<pre>";
    print_r($data);

?>

<a href="logout.php">SAIR</a>