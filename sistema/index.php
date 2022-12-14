<?php
require_once("conexao.php");

//INSERIR UM USUARIO ADM CASO NAO EXISTA//
$senha      = "123";
$senha_crip = md5($senha);

// verificações / consultas
$query           = $pdo->query("SELECT * FROM usuarios WHERE nivel = 'Administrador' ");
$resultado_query = $query->fetchAll(PDO::FETCH_ASSOC);  //EXECUTANDO A CONSULTA NO BD

$total_registro  = @count($resultado_query);

if ($total_registro == 0) {

    $pdo->query("INSERT INTO usuarios SET nome = 'Filipe Rabelo', email = '$email_sistema', 
                        cpf = '000.000.000.00', senha = '$senha', senha_crip = '$senha_crip', 
                        nivel = 'Administrador', data = curDate(), ativo = 'sim', foto = 'sem-foto.jpg' ");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nome_sistema; ?></title>


    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles/styleLogin.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="icon" type="image/png" href="img/favicon.ico">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">

                <div class="card-header">
                    <br>
                    <h3>Barbearia Pelo Longo</h3>
                    <h6>Faça seu Login</h6>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>

                <div class="card-body">
                    <form action="autenticar.php" method="POST">

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="email" type="text" class="form-control" placeholder="E-Mail ou Cpf">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input name="senha" type="password" class="form-control" placeholder="Senha">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Entrar" class="btn float-right login_btn">
                        </div>

                    </form>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Não tem uma conta?<a class="hover" href="#">Inscreva-se</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="hover" title="Clique para recuperar a Senha" data-toggle="modal" data-target="#exampleModal" href="#">Recuperar Senha
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-warning text-center" id="exampleModalLabel">Recuperar Senha</h5>
                <button type="button" id="btn-fechar-rec" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="POST" id="form-recuperar">
                <div class="modal-body">
                    <input id="email-recuperar" type="email" name="email" class="form-control" required placeholder="Digite Seu Email Para Recuperar sua Senha">
                </div>

                <br>
                <small>
                    <div id="mensagem-recuperar" align="center"></div>
                </small>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Recuperar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- AJAX PARA INSERIR DADOS -->
<script type="text/javascript">
    $("#form-recuperar").submit(function() { // NOME DO FORMULARIO

        // $("#msg-recuperar").text("mesnsagem")

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "recuperarSenha.php", // LOCAL ONDE ESTA O ARQUIVO Q VAI SER EXECUTADO
            type: 'POST',
            data: formData,

            success: function(mensagem) {
                $('#mensagem-recuperar').text(''); // NOME DA CAIXA DE MSG
                $('#mensagem-recuperar').removeClass()

                if (mensagem.trim() == "Recuperado com Sucesso") { // O QUE VAI SER DEVOLVIDO DO ARQUIVO
                    //$('#btn-fechar-rec').click();

                    $('#email-recuperar').val('');
                    $('#mensagem-recuperar').addClass('text-success')
                    $('#mensagem-recuperar').text('Sua senha foi enviada para o E-mail')

                } else {

                    $('#mensagem-recuperar').addClass('text-danger')
                    $('#mensagem-recuperar').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });
</script>
<!-- // FIM AJAX PARA INSERIR DADOS // -->