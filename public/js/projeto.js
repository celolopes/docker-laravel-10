function deleteRegisterIndex(rotaUrl, idDoRegistro) {
    if(confirm("Deseja realmente excluir este registro?")) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: idDoRegistro
            },
            beforeSend: function() {
                $.blockUI({
                    message: '<h3>Carregando...</h3>',
                    timeout: 2000,
                });
            }
        }).done(function(data) {
            $.unblockUI();
            if (data.success == true) {
                alert("Registro excluído com sucesso!");
                window.location.reload();
            } else {
                alert("Ocorreu um erro ao excluir o registro!");
                window.location.reload();
            }
        }).fail(function(data) {
            $.unblockUI();
            alert("Ocorreu um erro ao excluir o registro!");
            window.location.reload();
        });
    }
}

$("#mascara_valor").mask("#.##0,00", { reverse: true });
$("#cep").mask("00000-000", { reverse: true });

//Busca do CEP ViaCep
$('#cep').blur(function() {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep!= "") {
        var validacep = /^[0-9]{8}$/;
        if(validacep.test(cep)) {
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                if (!("erro" in dados)) {
                    $("#endereco").val(dados.logradouro + ", ");
                    if (dados.complemento == "") {
                        $("#logradouro").val(dados.localidade + " - " + dados.uf);
                    } else {
                        $("#logradouro").val(dados.complemento + ", " + dados.localidade + " - " + dados.uf);
                    }
                    $("#bairro").val(dados.bairro);
                } else {
                    alert("CEP não encontrado.");
                }
            });
        } else {
            alert("Formato de CEP inválido.");
        }
    } else {
        $("#logradouro").val("");
        $("#endereco").val("");
        $("#bairro").val("");
    }
});
