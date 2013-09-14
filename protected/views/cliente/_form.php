<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cliente-form',
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
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model, 'id_user', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'id_user'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'data_criacao'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'data_criacao',
			'value' => $model->data_criacao,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'data_criacao'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->