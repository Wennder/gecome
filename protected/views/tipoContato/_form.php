<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'tipo-contato-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model, 'area', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'area'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('contatos')); ?></label>
		<?php echo $form->checkBoxList($model, 'contatos', GxHtml::encodeEx(GxHtml::listDataEx(Contato::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->