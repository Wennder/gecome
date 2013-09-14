<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id_fornecedor'); ?>
		<?php echo $form->textField($model, 'id_fornecedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_pessoa_juridica'); ?>
		<?php echo $form->dropDownList($model, 'id_pessoa_juridica', GxHtml::listDataEx(PessoaJuridica::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_endereco'); ?>
		<?php echo $form->dropDownList($model, 'id_endereco', GxHtml::listDataEx(Endereco::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'site'); ?>
		<?php echo $form->textField($model, 'site', array('maxlength' => 120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_criacao'); ?>
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
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
