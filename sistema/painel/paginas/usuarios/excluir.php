<?php

require_once("../../../conexao.php");
$tabela = 'usuarios';

$id = $_POST['id'];
$pdo->query("DELETE FROM $tabela WHERE id = '$id' ");
echo 'Excluído com Sucesso' // PRECISAR IDENTICO AO ESCRITO NO AJAX

?>