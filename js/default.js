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
        $(".username").mask("a***?******", {placeholder: ""});
        $(".pw").mask("*****?***", {placeholder: ""});
        $(".c_pw").mask("*****?***", {placeholder: ""});
        $(".cep").mask("99999-999");
    });

    $('#Cliente_tipo_0').live('click', function() {
        $('#form_cpf').show('slow');
        $('#form_cnpj').hide('slow');
        $('#main-legend').text('Cadastro Pessoa Física');
    });

    $('#Cliente_tipo_1').live('click', function() {
        $('#form_cnpj').show('slow');
        $('#form_cpf').hide('slow');
        $('#main-legend').text('Cadastro Pessoa Jurídica');
    });

    $(".date").live('focus', function() {
        $(".date").popover('show');
    });
    $(".date").live('blur', function() {
        $(".date").popover('hide');
    });

    $("#Cliente_username").live('focus', function() {
        $("#Cliente_username").popover('show');
    });
    $("#Cliente_username").live('blur', function() {
        $("#Cliente_username").popover('hide');
    });

    $(".pw").live('focus', function() {
        $(".pw").popover('show');
    });
    $(".pw").live('blur', function() {
        $(".pw").popover('hide');
    });

    $("#Endereco_nome").live('focus', function() {
        $("#Endereco_nome").popover('show');
    });
    $("#Endereco_nome").live('blur', function() {
        $("#Endereco_nome").popover('hide');
    });

    $("#id_cidade").live('focus', function() {
        $("#id_cidade").popover('show');
    });
    $("#id_cidade").live('blur', function() {
        $("#id_cidade").popover('hide');
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
        <div class="control-group" id="add_' + i + '" style="display:none;">\n\
            <label class="control-label" for="Cliente_telefones_numero">Telefone</label>\n\
            <div class="controls">\n\
                <input class="phone" name="Cliente[telefones][numero][]" id="Cliente_telefones_numero" type="text" />\n\
                <select name="Cliente[telefones][tipo][]" id="Cliente_telefones_tipo">\n\
                    <option value="0" ' + sel0 + '>Residencial</option>\n\
                    <option value="1" ' + sel1 + '>Celular</option>\n\
                    <option value="2" ' + sel2 + '>Comercial</option>\n\
                </select>\n\
                <label class="del_telefone" id="' + i + '"><strong>X</strong></label>\n\
            </div>\n\
        </div>';
        $('#receptor').append(str);
        $('#add_' +i).show('slow');
        //$('#receptor').append($('#add_telefone').children().clone());
        //$('#receptor').append('<label id="del_telefone">Remover</label>');
        i++;
        $(".phone").mask("(99) 9999-9999");
    });

    $('.del_telefone').live('click', function() {
        $('#receptor').children('#add_' + $(this).attr('id')).hide('slow');
        setTimeout(function () {
            $('#receptor').children('#add_' + $('.del_telefone').attr('id')).remove();
        }, 1000);
    });

    $('#Cliente_confirma_senha').live('keyup', function() {
        if ($('#Cliente_senha').val() !== $('#Cliente_confirma_senha').val() && $('.erro_senha').length === 0) {
            $('#Cliente_confirma_senha').parent().append('<label class="erro_senha">Senha não confere!</label>');
        } else if ($('#Cliente_senha').val() === $('#Cliente_confirma_senha').val() && $('.erro_senha').length > 0) {
            $('#Cliente_confirma_senha').parent().children('.erro_senha').remove();
        }
    });

    $('#PessoaFisica_cpf').live('keyup', function() {
        str = $(this).val();
        str = str.replace(/\./g, '');
        str = str.replace(/\-/g, '');
        str = str.replace(/\_/g, '');
        //str.replaceAll(/\//g,'');

        if (!validarCPF(str) && str.length === 11 && $('.erro_cpf').length === 0) {
            $('#PessoaFisica_cpf').parent().append('<label class="erro_cpf">CPF inválido!</lavel>');
        } else if (validarCPF(str) && str.length === 11 && $('.erro_cpf').length > 0) {
            $('#PessoaFisica_cpf').parent().children('.erro_cpf').remove();
        }
    });

    $('#PessoaJuridica_cnpj').live('keyup', function() {
        str = $(this).val();
        str = str.replace(/\./g, '');
        str = str.replace(/\-/g, '');
        str = str.replace(/\_/g, '');
        str = str.replace(/\//g, '');

        console.log(str);

        if (!validarCNPJ(str) && str.length === 14 && $('.erro_cnpj').length === 0) {
            $('#PessoaJuridica_cnpj').parent().append('<label class="erro_cnpj">CNPJ inválido!</lavel>');
        } else if (validarCNPJ(str) && str.length === 14 && $('.erro_cnpj').length > 0) {
            $('#PessoaJuridica_cnpj').parent().children('.erro_cnpj').remove();
        }
    });

});

function validarCPF(cpf) {

    cpf = cpf.replace(/[^\d]+/g, '');

    if (cpf == '')
        return false;

    // Elimina CPFs invalidos conhecidos
    if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
        return false;

    // Valida 1o digito
    add = 0;
    for (i = 0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;

    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;

    return true;

}

function validarCNPJ(cnpj) {

    cnpj = cnpj.replace(/[^\d]+/g, '');

    if (cnpj == '')
        return false;

    if (cnpj.length != 14)
        return false;

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
        return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0, tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
        return false;

    return true;

}