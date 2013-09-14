<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'endereco-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model, 'nome', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'nome'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cep'); ?>
		<?php echo $form->textField($model, 'cep', array('maxlength' => 9)); ?>
		<?php echo $form->error($model,'cep'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->checkBox($model, 'tipo'); ?>
		<?php echo $form->error($model,'tipo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'rua'); ?>
		<?php echo $form->textField($model, 'rua', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'rua'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model, 'numero', array('maxlength' => 5)); ?>
		<?php echo $form->error($model,'numero'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'complemento'); ?>
		<?php echo $form->textField($model, 'complemento', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'complemento'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textArea($model, 'descricao'); ?>
		<?php echo $form->error($model,'descricao'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'bairro'); ?>
		<?php echo $form->textField($model, 'bairro', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'bairro'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_cidade'); ?>
		<?php echo $form->dropDownList($model, 'id_cidade', GxHtml::listDataEx(Cidade::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_cidade'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('fornecedors')); ?></label>
		<?php echo $form->checkBoxList($model, 'fornecedors', GxHtml::encodeEx(GxHtml::listDataEx(Fornecedor::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('funcionarios')); ?></label>
		<?php echo $form->checkBoxList($model, 'funcionarios', GxHtml::encodeEx(GxHtml::listDataEx(Funcionario::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('pessoaHasEnderecos')); ?></label>
		<?php echo $form->checkBoxList($model, 'pessoaHasEnderecos', GxHtml::encodeEx(GxHtml::listDataEx(PessoaHasEndereco::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->