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

// FUNCAO PARA EXCLUIR REGISTRO


function excluir(id) {

    $.ajax({
        url: 'paginas/' + pag + "/excluir.php",
        method: 'POST',
        data: { id },
        dataType: "text",

        success: function(mensagem) {
            if (mensagem.trim() == "Excluído com Sucesso") {
                listar();
            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }
        },
    });

}

function ativar(id, acao) {

    $.ajax({
        url: 'paginas/' + pag + "/mudar-status.php",
        method: 'POST',
        data: { id, acao },
        dataType: "text",

        success: function(mensagem) {
            if (mensagem.trim() == "Alterado com Sucesso") {
                listar();
            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }
        },
    });

}