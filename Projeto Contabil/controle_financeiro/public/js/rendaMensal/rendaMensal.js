$(document).ready(function() {
    $('#tbRendaMensal').hide();

    if($('#txtAno').val() != '' && $('#selMes').val() != ''){
        showInformation($('#txtAno').val(),$('#selMes').val())
    }

    $(document).on('change', '#selMes',function() {
        if($(this).val() != '' && $('#txtAno').val() != '') 
            showInformation($('#txtAno').val(),$(this).val())
    });

    $('#txtAno').blur(function() {
        if($(this).val() != '' && $('#selMes').val() != '') 
            showInformation($(this).val(),$('#selMes').val())            
    });

    $(document).on('click', '#btnRendaMensal',function() {
        Novo()
    });

    $(document).on('click', '#btnEditar',function() {
        Editar($(this).val())
    });

    $(document).on('click', '#btnExcluir',function() {
        Excluir($(this).val(),$('#txtAno').val(), $('#selMes').val())
    });


    $(document).on('click', '#btnLimpar',function() {
        reload()
    });

    $(document).on('click', '#btnInserir',function() {
        Gravar();
    });
})

function Gravar(){
    $.ajax({
        url: '/controle-orcamentario/renda-mensal/store',
        type: 'POST',
        data: $('#formRendaMensal').serialize(),
        success: function(data) {
            const { message } = data;
            if(message)
                Swal.fire({
                    text: message,
                    confirmButtonText: "Ok",
                    confirmButtonColor: "#394a4e",
                }).then((result) => {
                    if (result.isConfirmed) {
                        reload()
                    } 
                });
        },
        error: function(xhr, status, error) {
            var errors = xhr.responseJSON.errors;
            $.each(errors, function(key, value) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: value[0],
                    confirmButtonColor: "#394a4e",
                  });
                  return false;
            });
        }
    });
}

function Novo() {
    const ano = $('#txtAno').val();
    const mes = $('#selMes').val();
    if(ano != ''  && mes != ''){
        var url = '/controle-orcamentario/renda-mensal/create/' + encodeURIComponent(ano) + '/' + encodeURIComponent(mes);
        window.location.href = url;
    }else{
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Por favor, preencha todos os campos!",
            confirmButtonColor: "#394a4e",
        });
    }
}

function Editar(codRendaMensal) {
    const ano = $('#txtAno').val();
    const mes = $('#selMes').val();
    var url = '/controle-orcamentario/renda-mensal/create/' + encodeURIComponent(ano) + '/' + encodeURIComponent(mes) + '/' + encodeURIComponent(codRendaMensal);
    window.location.href = url;
}

function reload(){
    const ano = $('#HDN_ANO_RENDA_MENSAL').val() != undefined ? $('#HDN_ANO_RENDA_MENSAL').val() : $('#txtAno').val(); 
    const mes = $('#HDN_MES_RENDA_MENSAL').val() != undefined ? $('#HDN_MES_RENDA_MENSAL').val() : $('#selMes').val();
    window.location.href = '/controle-orcamentario/renda-mensal/' + encodeURIComponent(ano) + '/' + encodeURIComponent(mes);
}

function showInformation(ano, mes){
    var html = '';
    $.ajax({
        url: '/controle-orcamentario/renda-mensal/show/' + encodeURIComponent(ano) + '/' + encodeURIComponent(mes),
        type: 'GET',
        success: function(data) {
            var somaValorRenda = 0
            var vlrTotalRenda = 0
            data.forEach(element => {
                html +=`<tr>`
                html +=`<td>${element['NOME_RENDA_MENSAL']}</td>`
                html +=`<td>${Number(element['VALOR_RENDA_MENSAL']).toLocaleString('pt-BR', {style: 'currency',currency: 'BRL'})}</td>`
                html +=`<td>
                            <button type="button" name="btnEditar"  id="btnEditar"  class="button-padrao fa-solid fa-pencil" value="${element['COD_RENDA_MENSAL']}" title="Editar"></button>
                            <button type="button" name="btnExcluir" id="btnExcluir" class="button-padrao fa-solid fa-trash"  value="${element['COD_RENDA_MENSAL']}" title="Excluir"></button>
                        </td>`
                html +=`</tr>`
                somaValorRenda += Number(element['VALOR_RENDA_MENSAL'])
            })
            vlrTotalRenda = somaValorRenda.toLocaleString('pt-BR', {style: 'currency',currency: 'BRL'});
            $('#valorTotal').text(vlrTotalRenda);
            $('#tbodyRendaMensal').html(html);
            $('#tbRendaMensal').show();
        },
    });
}

function Excluir(codRendaMensal,$ano,$mes){
    Swal.fire({
        title: 'Confirmação',
        text: "Você deseja excluir este registro?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#394a4e',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/controle-orcamentario/renda-mensal/delete/',
                 type: 'POST',
                 data:{codRendaMensal},
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    const { message } = data;
                    if(message)
                        Swal.fire({
                            text: message,
                            confirmButtonText: "Ok",
                            confirmButtonColor: "#394a4e",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                showInformation($ano,$mes)
                            } 
                        });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ocorreu um erro ao excluir o registro.",
                        confirmButtonColor: "#394a4e",
                    });
                }
            });
        }
    });
}