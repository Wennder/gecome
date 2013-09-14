<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'pessoa-juridica-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'razao_social'); ?>
		<?php echo $form->textField($model, 'razao_social', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'razao_social'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nome_fantasia'); ?>
		<?php echo $form->textField($model, 'nome_fantasia', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'nome_fantasia'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cnpj'); ?>
		<?php echo $form->textField($model, 'cnpj', array('maxlength' => 18)); ?>
		<?php echo $form->error($model,'cnpj'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'insc_estadual'); ?>
		<?php echo $form->textField($model, 'insc_estadual', array('maxlength' => 8)); ?>
		<?php echo $form->error($model,'insc_estadual'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('clientes')); ?></label>
		<?php echo $form->checkBoxList($model, 'clientes', GxHtml::encodeEx(GxHtml::listDataEx(Cliente::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('fornecedors')); ?></label>
		<?php echo $form->checkBoxList($model, 'fornecedors', GxHtml::encodeEx(GxHtml::listDataEx(Fornecedor::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('pessoaHasEnderecos')); ?></label>
		<?php echo $form->checkBoxList($model, 'pessoaHasEnderecos', GxHtml::encodeEx(GxHtml::listDataEx(PessoaHasEndereco::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('pessoaHasTelefones')); ?></label>
		<?php echo $form->checkBoxList($model, 'pessoaHasTelefones', GxHtml::encodeEx(GxHtml::listDataEx(PessoaHasTelefone::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->