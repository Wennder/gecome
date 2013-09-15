/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {

    jQuery(function($) {
        $(".date").mask("99/99/9999");
        $(".phone").mask("(99) 9999-9999");
        $(".cpf").mask("999.999.999-99");
        $(".cnpj").mask("99.999.999/9999-99");
        $(".rg").mask("999999999?9", {placeholder: " "});
        $(".insc_estadual").mask("99999999", {placeholder: " "});
        $(".pw").mask("*****?***", {placeholder: ""});
        $(".c_pw").mask("*****?***", {placeholder: ""});
        $(".cep").mask("9999-999");
    });

    $('#Cliente_tipo_0').live('click', function() {
        $('#form_cpf').show();
        $('#form_cnpj').hide();
        $('#main-legend').text('Cadastro Pessoa Física');
    });

    $('#Cliente_tipo_1').live('click', function() {
        $('#form_cnpj').show();
        $('#form_cpf').hide();
        $('#main-legend').text('Cadastro Pessoa Jurídica');
    });

    $(".date").live('focus', function() {
        $(".date").tooltip('show');
    });
    $(".date").live('blur', function() {
        $(".date").tooltip('hide');
    });

    $("#Cliente_username").live('focus', function() {
        $("#Cliente_username").tooltip('show');
    });
    $("#Cliente_username").live('blur', function() {
        $("#Cliente_username").tooltip('hide');
    });

    $(".pw").live('focus', function() {
        $(".pw").tooltip('show');
    });
    $(".pw").live('blur', function() {
        $(".pw").tooltip('hide');
    });

    $("#Cliente_enderecos_nome").live('focus', function() {
        $("#Cliente_enderecos_nome").tooltip('show');
    });
    $("#Cliente_enderecos_nome").live('blur', function() {
        $("#Cliente_enderecos_nome").tooltip('hide');
    });

    var i = 0;
    $('#link_telefone').live('click', function() {

        sel0 = '';
        sel1 = '';
        sel2 = '';

        if (i % 3 == 0) {
            sel1 = 'selected';
        } else if (i % 3 == 1) {
            sel2 = 'selected';
        } else if (i % 3 == 2) {
            sel0 = 'selected';
        }

        str = '\n\
        <div class="control-group" id="add_' + i + '">\n\
            <label class="control-label" for="Cliente_telefones_numero">Telefone</label>\n\
            <div class="controls">\n\
                <input class="phone" name="Cliente[telefones][numero][]" id="Cliente_telefones_numero" type="text" />\n\
                <select name="Cliente[telefones][tipo][]" id="Cliente_telefones_tipo">\n\
                    <option value="0" ' + sel0 + '>Residencial</option>\n\
                    <option value="1" ' + sel1 + '>Celular</option>\n\
                    <option value="2" ' + sel2 + '>Comercial</option>\n\
                </select>\n\
                <label class="del_telefone" id="' + i + '">X</label>\n\
            </div>\n\
        </div>';
        $('#receptor').append(str);
        //$('#receptor').append($('#add_telefone').children().clone());
        //$('#receptor').append('<label id="del_telefone">Remover</label>');
        i++;
        $(".phone").mask("(99) 9999-9999");
    });

    $('.del_telefone').live('click', function() {
        $('#receptor').children('#add_' + $(this).attr('id')).remove();
    });

    $('#Cliente_confirma_senha').live('keyup', function() {
        if ($('#Cliente_senha').val() !== $('#Cliente_confirma_senha').val() && $('.erro_senha').length === 0) {
            $('#Cliente_confirma_senha').parent().append('<label class="erro_senha">Senha não confere!</label>');
        } else if ($('#Cliente_senha').val() === $('#Cliente_confirma_senha').val() && $('.erro_senha').length > 0) {
            $('#Cliente_confirma_senha').parent().children('.erro_senha').remove();
        }
    });

});

function mySplit(input) {
    var output = input.split("##");
    return output;
}