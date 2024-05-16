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
