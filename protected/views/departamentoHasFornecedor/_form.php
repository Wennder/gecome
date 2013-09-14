<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'departamento-has-fornecedor-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id_departamento'); ?>
		<?php echo $form->dropDownList($model, 'id_departamento', GxHtml::listDataEx(Departamento::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_departamento'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_fornecedor'); ?>
		<?php echo $form->dropDownList($model, 'id_fornecedor', GxHtml::listDataEx(Fornecedor::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_fornecedor'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->