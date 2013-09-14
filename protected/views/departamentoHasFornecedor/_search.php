<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id_departamento_has_fornecedor'); ?>
		<?php echo $form->textField($model, 'id_departamento_has_fornecedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_departamento'); ?>
		<?php echo $form->dropDownList($model, 'id_departamento', GxHtml::listDataEx(Departamento::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_fornecedor'); ?>
		<?php echo $form->dropDownList($model, 'id_fornecedor', GxHtml::listDataEx(Fornecedor::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
