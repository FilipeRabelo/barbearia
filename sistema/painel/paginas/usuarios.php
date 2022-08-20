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

<!-- Modal DADOS-->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title text-warning text-center" id="exampleModalLabel"><span id="nome_dados"></span></h3>
                <button type="button" id="btn-fechar-perfil" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row" style="border-bottom:1px solid #cac7c7;">
                    <div class="col-md-6">
                        <span><b>Email:</b></span>
                        <span id="email_dados"></span>
                    </div>
                    <div class="col-md-6">
                        <span><b>Senha:</b></span>
                        <span id="senha_dados"></span>
                    </div>
                </div>

                <div class="row" style="border-bottom:1px solid #cac7c7;">
                    <div class="col-md-6">
                        <span><b>Cpf:</b></span>
                        <span id="cpf_dados"></span>
                    </div>
                    <div class="col-md-6">
                        <span><b>Telefone:</b></span>
                        <span id="telefone_dados"></span>
                    </div>
                </div>

                <div class="row" style="border-bottom:1px solid #cac7c7;">
                    <div class="col-md-6">
                        <span><b>Nivel:</b></span>
                        <span id="nivel_dados"></span>
                    </div>
                    <div class="col-md-6">
                        <span><b>Ativo:</b></span>
                        <span id="ativo_dados"></span>
                    </div>
                </div>

                <div class="row" style="border-bottom:1px solid #cac7c7;">
                    <div class="col-md-12">
                        <span><b>Cadastrado em:</b></span>
                        <span id="data_dados"></span>
                    </div>
                </div>

                <div class="row" style="border-bottom:1px solid #cac7c7;">
                    <div class="col-md-12">
                        <span><b>Endereço:</b></span>
                        <span id="endereco_dados"></span>
                    </div>
                </div>

                <!-- FOTO -->
                <div class="row">
                    <div class="col-md-12" align="center">
                        <img width="250px" id="target_mostrar">
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- FIM Modal -->


<script type="text/javascript">
    var pag = "<?= $pag ?>" // traznedo uma variavel do php para o Js
</script>

<script src="js/ajax.js"></script>