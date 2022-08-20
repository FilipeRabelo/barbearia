// AJAX PARA LISTAR DADOS

//Codigo para ser reutilizado

//INICIANDO O DOCUMENTO
$(document).ready(function() {
    listar();
});

//CRIANDO A FUNCAO PARA LISTAR 
function listar() {
    $.ajax({
        url: 'paginas/' + pag + "/listar.php", //CAMIHNO DO ARQUIVO
        method: 'POST',
        data: $('#form').serialize(),
        dataType: "html",

        success: function(result) {
            $("#listar").html(result); //DIV CHAMADA LISTAR
            $('#mensagem-excluir').text('');
        }
    });
}