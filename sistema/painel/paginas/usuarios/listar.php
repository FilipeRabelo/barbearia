<?php

require_once("../../../conexao.php");

$tabela = "usuarios";

// <!-- Manter nessa distancia  -->
// echo <<<HTML
// <p>{$tabela}</p>    
// HTML;

$query              = $pdo->query("SELECT * FROM $tabela ORDER BY id DESC  ");
$resultado_query    = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD
$total_registro     = @count($resultado_query);
//APOS A CONSULTA OD DADOS VAO PARA AS VARIAVEIS//
if ($total_registro > 0) {
    // quando for maior de zero vou mostrar as informações //
    echo <<<HTML
    <!-- <small> -->
    <table class="table table-hover" id="tabela">
    <thead>
    <tr>
    <th>Nome</th>
    <th class="esc">E-mail       </th>
    <th class="esc">Senha        </th>
    <th class="esc">Nivel        </th>  <!--CLASS ESC PARA RESPONSIVIDADE-->
    <th class="esc">Ativo        </th>
    <th class="esc">Dt. Cadastro </th>
    <th>Ações</th>
    </tr>
    </thead>
    <tbody>
HTML;

    for ($i = 0; $i < $total_registro; $i++) {

        foreach ($resultado_query[$i] as $key => $value) { }

        $id       = $resultado_query[$i]["id"];
        $nome     = $resultado_query[$i]["nome"];
        $email    = $resultado_query[$i]["email"];
        $cpf      = $resultado_query[$i]["cpf"];
        $senha    = $resultado_query[$i]["senha"];
        $nivel    = $resultado_query[$i]["nivel"];
        $data     = $resultado_query[$i]["data_cadastro"];
        $ativo    = $resultado_query[$i]["ativo"];
        $telefone = $resultado_query[$i]["telefone"];
        $endereco = $resultado_query[$i]["endereco"];
        $foto     = $resultado_query[$i]["foto"];

        $dataF = implode('/', array_reverse(explode('-', $data)));


        if ($nivel === 'Administrador') {
            $senhaF = '*******';
        } else {
            $senhaF = $senha;
        }

        if ($ativo == 'Sim') {
            $icone = 'fa-check-square';
            $titulo_link = 'Desativar Item';
            $acao = 'Não';
            $classe_linha = '';
        } else {
            $icone = 'fa-square-o';
            $titulo_link = 'Ativar Item';
            $acao = 'Sim';
            $classe_linha = 'text-muted';
        }


        // TODA VEZ Q PERCORRER O FOR ELE VAI FAZER UMA TR

        echo <<<HTML
    <tr class="{$classe_linha}">
        <td>
        <img src="img/perfil/{$foto}" width="27px" class="mr-2">
        {$nome}  
        </td>   <!--NAO TEM ECHO, AQUI É CHAVES-->
        <td class="esc">{$email} </td> 
        <td class="esc">{$senhaF}</td> 
        <td class="esc">{$nivel} </td> 
        <td class="esc">{$ativo} </td> 
        <td class="esc">{$dataF} </td> 

        <td>
        <a href="#" onclick="editar()" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a>

        <a href="#" onclick="mostrar('{$nome}', '{$email}', '{$cpf}', '{$senha}', '{$nivel}', '{$dataF}', '{$ativo}', '{$telefone}', '{$endereco}', '{$foto}',)" title="Ver Dados"><i class="fa fa-info-circle text-secondary"></i></a>
        
        <li class="dropdown head-dpdn2" style="display: inline-block;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-trash-o text-danger"></i></a>
        
        <ul class="dropdown-menu" style="margin-left:-230px;">
        <li>
        <div class="notification_desc2">
        <p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
        </div>
        </li>										
        </ul>
        </li>

        <a href="#" onclick="ativar('{$id}', '{$acao}')" title="{$titulo_link}"><i class="fa {$icone} text-success"></i></a>
        
    </td>
    </tr>
    HTML;
    }  //FECHAMENTO DO FOR

    //PARA FECHAR
    echo <<<HTML
    </tbody>
    <small><div align="center" id="mensagem-excluir"></div></small>
    </table>
    <!-- </small> -->
HTML;

} else {

    echo " Não possui nenhum registro cadastrado!!";

}
