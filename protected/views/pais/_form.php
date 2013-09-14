<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'pais-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model, 'nome', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'nome'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('estados')); ?></label>
		<?php echo $form->checkBoxList($model, 'estados', GxHtml::encodeEx(GxHtml::listDataEx(Estado::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->