<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'funcionario-form',
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
		<?php echo $form->labelEx($model,'id_telefone'); ?>
		<?php echo $form->dropDownList($model, 'id_telefone', GxHtml::listDataEx(Telefone::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_telefone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_endereco'); ?>
		<?php echo $form->dropDownList($model, 'id_endereco', GxHtml::listDataEx(Endereco::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_endereco'); ?>
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('departamentoHasFuncionarios')); ?></label>
		<?php echo $form->checkBoxList($model, 'departamentoHasFuncionarios', GxHtml::encodeEx(GxHtml::listDataEx(DepartamentoHasFuncionario::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->