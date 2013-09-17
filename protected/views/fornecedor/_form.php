<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'fornecedor-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id_pessoa_juridica'); ?>
		<?php echo $form->dropDownList($model, 'id_pessoa_juridica', GxHtml::listDataEx(PessoaJuridica::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_pessoa_juridica'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'site'); ?>
		<?php echo $form->textField($model, 'site', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'site'); ?>
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('contatos')); ?></label>
		<?php echo $form->checkBoxList($model, 'contatos', GxHtml::encodeEx(GxHtml::listDataEx(Contato::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('departamentoHasFornecedors')); ?></label>
		<?php echo $form->checkBoxList($model, 'departamentoHasFornecedors', GxHtml::encodeEx(GxHtml::listDataEx(DepartamentoHasFornecedor::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->