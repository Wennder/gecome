<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'telefone-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->checkBox($model, 'tipo'); ?>
		<?php echo $form->error($model,'tipo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model, 'numero', array('maxlength' => 13)); ?>
		<?php echo $form->error($model,'numero'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('contatos')); ?></label>
		<?php echo $form->checkBoxList($model, 'contatos', GxHtml::encodeEx(GxHtml::listDataEx(Contato::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('departamentos')); ?></label>
		<?php echo $form->checkBoxList($model, 'departamentos', GxHtml::encodeEx(GxHtml::listDataEx(Departamento::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('pessoaHasTelefones')); ?></label>
		<?php echo $form->checkBoxList($model, 'pessoaHasTelefones', GxHtml::encodeEx(GxHtml::listDataEx(PessoaHasTelefone::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->