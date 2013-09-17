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
        <?php echo $form->textFieldRow($model_pf, 'data_nascimento', array('class' => 'date', 'rel' => 'popover', 'data-content' => 'Formato: DD/MM/AAAA', 'data-placement' => 'right')); ?>
    </div>
    
    <div id="form_cnpj">
        <?php echo $form->textFieldRow($model_pj, 'razao_social'); ?>
        <?php echo $form->textFieldRow($model_pj, 'nome_fantasia'); ?>
        <?php echo $form->textFieldRow($model_pj, 'cnpj', array('class' => 'cnpj')); ?>
        <?php echo $form->textFieldRow($model_pj, 'insc_estadual', array('class' => 'insc_estadual')); ?>
    </div>
    
    <div class="control-group">
        <label class="control-label required" for="Cliente_telefones_numero">Telefone Preferencial <span class='required'>*</span></label>
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
        <?php echo CHtml::label('+ Adicionar telefone', '', array('id' => 'link_telefone')); ?>
    </div>
    
    <hr>
    
    <?php echo $form->textFieldRow($model, 'username', array('class' => 'username', 'rel' => 'popover', 'data-content' => 'Seu nome de usuário deve ter de 4 a 10 caracteres, somente letras e números, e iniciar com uma letra', 'data-placement' => 'right')); ?>
    
    <?php echo $form->textFieldRow($model, 'email'); ?>
    
    <?php echo $form->passwordFieldRow($model, 'senha', array('class' => 'pw', 'rel' => 'popover', 'data-content' => 'Sua senha deve ter de 5 a 8 caracteres, somente letras e números', 'data-placement' => 'right')); ?>
    
    <?php echo $form->passwordFieldRow($model, 'confirma_senha', array('class' => 'c_pw')); ?>
    
</fieldset>

<hr>

<fieldset>
    <legend>Cadastro de Endereço Preferencial<br><span style="color: #87b2ff; font-size: 12pt;">Após cadastrado, vá em Usuário > Perfil para adicionar novos endereços</span></legend>
    
    <?php echo $form->textFieldRow($model_endereco, 'nome', array(
        'rel' => 'popover', 
        'data-content' => 'Escolha um nome para esse endereço', 
        'data-placement' => 'right'
        )); ?>
    
    <?php echo $form->radioButtonListInlineRow($model_endereco, 'tipo', array(
        'Apartamento',
        'Casa',
        'Comercial'
    )); ?>
    
    <?php echo $form->textFieldRow($model_endereco, 'cep', array(
        'class' => 'cep'
    )); ?>
    
    <?php echo $form->textFieldRow($model_endereco, 'rua'); ?>
    
    <?php echo $form->textFieldRow($model_endereco, 'numero'); ?>
    
    <?php echo $form->textFieldRow($model_endereco, 'complemento'); ?>
    
    <?php echo $form->textAreaRow($model_endereco, 'descricao', array(
        'style' => 'width: 412px'
    )); ?>
    
    <?php echo $form->textFieldRow($model_endereco, 'bairro'); ?>
    
    <?php echo CHtml::hiddenField('Endereco[id_cidade]', '', array('id' => 'Endereco_id_cidade')); ?>
    
    <div class="control-group">
        <label class="control-label" for="id_cidade">Cidade <span class='required'>*</span></label>
            <div class="controls">
                <?php
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'id_cidade',
                        'value' => $model_endereco->id_cidade,
                        'source' => Yii::app()->createUrl('/endereco/cidadeAutoComplete'),
                        'options' => array(
                            'minLength' => '3',
                            'select' => 'js:function(event, ui) { $("#Endereco_id_cidade").val(ui.item.id); }'
                        ),
                        'htmlOptions' => array(
                            'id' => 'id_cidade',
                            'rel' => 'popover',
                            'data-content' => 'Digite no mínimo 3 letras e espere carregar as opções',
                            'data-placement' => 'right',
                        ),
                    ));
                ?>
            </div>
    </div>
    
</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Cadastrar')); ?>
</div>

<?php $this->endWidget(); ?>

<style>
    div#outra_cidade
    {
        display:none;
    }
    div#outro_estado
    {
        display:none;
    }
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
    label#link_endereco
    {
        cursor: pointer;
        color: #87b2ff;
        margin-top: -15px;
    }
    label.del_telefone, label.erro_senha
    {
        color: #b94a48;
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