<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'estado-form',
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
		<div class="row">
		<?php echo $form->labelEx($model,'uf'); ?>
		<?php echo $form->textField($model, 'uf', array('maxlength' => 5)); ?>
		<?php echo $form->error($model,'uf'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_pais'); ?>
		<?php echo $form->dropDownList($model, 'id_pais', GxHtml::listDataEx(Pais::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_pais'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('cidades')); ?></label>
		<?php echo $form->checkBoxList($model, 'cidades', GxHtml::encodeEx(GxHtml::listDataEx(Cidade::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->