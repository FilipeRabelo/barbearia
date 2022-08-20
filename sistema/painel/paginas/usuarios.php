<?php
@session_start();

require_once("verificar.php");
require_once("../conexao.php");

$pag = 'usuarios';

?>

<div class="">
    <a class="btn btn-primary">Novo Usuario</a>
</div>

<div class="bs-example widget-shadow" style="padding:15px;" id="listar">

</div>

<script type="text/javascript">
    var pag = "<?=$pag?>"  // traznedo uma variavel do php para o Js
</script>

<script src="js/ajax.js"></script>

