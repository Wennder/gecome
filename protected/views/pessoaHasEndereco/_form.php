<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'pessoa-has-endereco-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id_pessoa_fisica'); ?>
		<?php echo $form->dropDownList($model, 'id_pessoa_fisica', GxHtml::listDataEx(PessoaFisica::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_pessoa_fisica'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_pessoa_juridica'); ?>
		<?php echo $form->dropDownList($model, 'id_pessoa_juridica', GxHtml::listDataEx(PessoaJuridica::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_pessoa_juridica'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_endereco'); ?>
		<?php echo $form->dropDownList($model, 'id_endereco', GxHtml::listDataEx(Endereco::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_endereco'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'preferencial'); ?>
		<?php echo $form->checkBox($model, 'preferencial'); ?>
		<?php echo $form->error($model,'preferencial'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->