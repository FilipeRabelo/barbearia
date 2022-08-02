<?php
    @session_start();

    //PARA EVITAR ACESSO PELO URL
    if (@$_SESSION["id"] == "") {
        echo "<script>window.location='../index.php'</script>";   // REDIRECIONAMENTO //
        exit();  //OBRIGATORIO COLOCAR O EXIT APOS FAZER O REDIRECIONAMENTO
    }

?>