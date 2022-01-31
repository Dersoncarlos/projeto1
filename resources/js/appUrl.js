$(function () {
    if (window.location.pathname === '/urls') {
        getListUrls();
        pageEvents();
        gridEvents();
    }

});

function pageEvents() {
    $('#formAddUrl').on('submit', function (e) {
        e.preventDefault();
        let url = $(this).find("input[name='url']").val();
        let btnSubmit = $(this).find("button[type='submit']");
       
        if (validations.validURL(url)) {
            $.ajax({
                method: 'POST',
                url: '/urls/store',
                data: $(this).serialize(),
                beforeSend: function () {
                    $(btnSubmit).html('Processando...').addClass('disabled');
                },
                success: function () {
                    alert("Url Adicionada com sucesso.");
                    $(btnSubmit).html('Salvar').removeClass('disabled');
                    getListUrls();
                    $('#modal-default').modal('hide');
                },
                error: function () {
                    if (res.status === 422) {
                        alert("Url Inválida");
                    } else {
                        alert("Ocorreu um erro ao tentar adicionar a URL. Tente novamente mais tarde.");
                    }
                    $(btnSubmit).html('Salvar').removeClass('disabled');
                }
            })
       
        } else {
            alert("Url inválida.");
        }
    });

}

function gridEvents() {

    $(".removeUrl").on('click', function () {
        let willRemove = confirm("Deseja realmente excluir?");

        if (willRemove) {
            let urlId = $(this).attr('id');
            let btn = this;
            let _token = $("input[name='_token']").val();
            $.ajax({
                method: 'DELETE',
                url: `/urls/destroy/${urlId}`,
                data: { _token },
                beforeSend: function () {
                    $(btn).addClass('disabled');
                    helpers.loadOptionsBtn(btn);
                },
                success: function () {
                    alert("Url removido com sucesso.")
                    getListUrls();
                },
                error: function () {
                    alert("Ocorreu um erro ao tentar remover url.");
                    $(btn).removeClass('disabled');
                    $(btn).html('<i class="fas fa-trash"></i>')
                }
            })
        }

    });

    $("#reloadUrls").on('click', function () {
        getListUrls();
    });

    // $('.showUrl').on('click', function () {
    //     let btn = this;
    //     let urlId = $(btn).attr('id');
    //     $.ajax({
    //         method: 'GET',
    //         url: `/url/show/${urlId}`,
    //         beforeSend: function () {
    //             helpers.loadOptionsBtn(btn);
    //         },
    //         success: function (res) { 

    //         }
    //     })
    // })
}

function getListUrls() {
    $.ajax({
        method: 'GET',
        url: '/urls/list',
        beforeSend: function () {
            helpers.loadGrid($('#gridUrls'));
        },
        success: function (res) {
            $('#gridUrls').html(res);
            gridEvents();
        }
    })

}

