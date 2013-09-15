<?php 
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'cliente_form',
        'type' => 'horizontal',
        'htmlOptions'=>array('class'=>'well'),
    ));
?>

<fieldset>
    <legend id="main-legend">Cadastro Pessoa Física</legend>

    <?php echo $form->radioButtonListInlineRow($model, 'tipo', array(
        'Pessoa Física',
        'Pessoa Jurídica',
    )); ?>
    <hr>
    <div id="form_cpf">
        <?php echo $form->textFieldRow($model_pf, 'nome'); ?>
        <?php echo $form->textFieldRow($model_pf, 'cpf', array('class' => 'cpf')); ?>
        <?php echo $form->textFieldRow($model_pf, 'rg', array('class' => 'rg')); ?>
        <?php echo $form->dropDownListRow($model_pf, 'sexo', array('Masculino', 'Feminino')); ?>
        <?php echo $form->textFieldRow($model_pf, 'data_nascimento', array('class' => 'date', 'rel' => 'tooltip', 'title' => 'Formato: DD/MM/AAAA', 'data-placement' => 'right')); ?>
    </div>
    
    <div id="form_cnpj">
        <?php echo $form->textFieldRow($model_pj, 'razao_social'); ?>
        <?php echo $form->textFieldRow($model_pj, 'nome_fantasia'); ?>
        <?php echo $form->textFieldRow($model_pj, 'cnpj', array('class' => 'cnpj')); ?>
        <?php echo $form->textFieldRow($model_pj, 'insc_estadual', array('class' => 'insc_estadual')); ?>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_telefones_numero">Telefone <span class='required'>*</span></label>
        <div class="controls">
            <input class="phone" name="Cliente[telefones][numero][]" id="Cliente_telefones_numero" type="text" />
            <select name="Cliente[telefones][tipo][]" id="Cliente_telefones_tipo">
                <option value='0' selected>Residencial</option>
                <option value='1'>Celular</option>
                <option value='2'>Comercial</option>
            </select>
        </div>
    </div>
    
    <div id="add_telefone">
        <?php echo $form->textFieldRow($model, 'telefones[numero][]', array('class' => 'phone')); ?>
    </div>
    
    <div id="receptor"></div>
    
    <div class="controls">
        <?php echo CHtml::label('Adicionar telefone', '', array('id' => 'link_telefone')); ?>
    </div>
    
    <hr>
    
    <?php echo $form->textFieldRow($model, 'username', array('rel' => 'tooltip', 'title' => 'Você poderá utilizar esse nome para efetuar login', 'data-placement' => 'right')); ?>
    
    <?php echo $form->textFieldRow($model, 'email'); ?>
    
    <?php echo $form->passwordFieldRow($model, 'senha', array('class' => 'pw', 'rel' => 'tooltip', 'title' => 'Sua senha deve ter de 5 a 8 caracteres, somente letras e números', 'data-placement' => 'right')); ?>
    
    <?php echo $form->passwordFieldRow($model, 'confirma_senha', array('class' => 'c_pw')); ?>
    
</fieldset>

<hr>

<fieldset>
    <legend>Cadastro de Endereço</legend>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_nome">Nome <span class='required'>*</span></label>
        <div class="controls">
            <input name="Cliente[enderecos][nome][]" id="Cliente_enderecos_nome" type="text" rel="tooltip" title="Nome para esse endereço" data-placement="right"  />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_cep">CEP <span class='required'>*</span></label>
        <div class="controls">
            <input class="cep" name="Cliente[enderecos][cep][]" id="Cliente_enderecos_cep" type="text" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_tipo">Identificação do Endereço <span class='required'>*</span></label>
        <div class="controls">
            <input id="ytCliente_tipo" type="hidden" value="" name="Cliente[enderecos][tipo][]" />
            <label class="radio inline">
                <input id="Cliente_enderecos_tipo_0" value="0" checked="checked" type="radio" name="Cliente[enderecos][tipo][]" />
                <label for="Cliente_enderecos_tipo_0">Apartamento</label>
            </label>
            <label class="radio inline">
                <input id="Cliente_enderecos_tipo_1" value="1" type="radio" name="Cliente[enderecos][tipo][]" />
                <label for="Cliente_enderecos_tipo_1">Casa</label>
            </label>
            <label class="radio inline">
                <input id="Cliente_enderecos_tipo_2" value="2" type="radio" name="Cliente[enderecos][tipo][]" />
                <label for="Cliente_enderecos_tipo_2">Comercial</label>
            </label>
            <label class="radio inline">
                <input id="Cliente_enderecos_tipo_3" value="3" type="radio" name="Cliente[enderecos][tipo][]" />
                <label for="Cliente_enderecos_tipo_3">Outro</label>
            </label>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_rua">Rua <span class='required'>*</span></label>
        <div class="controls">
            <input name="Cliente[enderecos][rua][]" id="Cliente_enderecos_rua" type="text" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_numero">Número <span class='required'>*</span></label>
        <div class="controls">
            <input name="Cliente[enderecos][numero][]" id="Cliente_enderecos_numero" type="text" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_complemento">Complemento</label>
        <div class="controls">
            <input name="Cliente[enderecos][complemento][]" id="Cliente_enderecos_complemento" type="text" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_descricao">Informações de Referência</label>
        <div class="controls">
            <textarea name="Cliente[enderecos][descricao][]" id="Cliente_enderecos_descricao" style="margin: 0px; width: 412px; height: 40px;"></textarea>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_bairro">Bairro <span class='required'>*</span></label>
        <div class="controls">
            <input name="Cliente[enderecos][bairro][]" id="Cliente_enderecos_bairro" type="text" />
        </div>
    </div>
    
    <?php echo CHtml::hiddenField('id_pais', '1'); ?>
    
    <div class="control-group">
        <label class="control-label" for="Cliente_enderecos_pais">País <span class="required">*</span></label>
        <div class="controls">
            <select name="Cliente[enderecos][pais][]" id="Cliente_enderecos_pais">
                <?php $paises = Pais::model()->findAll(array('order' => ' nome')); ?>
                <?php foreach ($paises as $pais) { ?>
                    <option value="<?php echo $pais->id_pais; ?>" <?php echo $pais->id_pais == 1 ? 'selected' : '' ?>><?php echo $pais->nome; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    
</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Cadastrar')); ?>
</div>

<?php $this->endWidget(); ?>

<style>
    div#form_cpf
    {
        display: block;
    }
    div#form_cnpj
    {
        display: none;
    }
    label#link_telefone
    {
        cursor: pointer;
        color: #87b2ff;
        margin-top: -15px;
    }
    label.del_telefone, label.erro_senha
    {
        color: #ff575b;
        display: inline-block;
        margin-bottom: 0;
        margin-left: 10px;
        vertical-align: middle;
    }
    div#add_telefone
    {
        display: none;
    }
</style>