<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id_tipo_contato'); ?>
		<?php echo $form->textField($model, 'id_tipo_contato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'area'); ?>
		<?php echo $form->textField($model, 'area', array('maxlength' => 120)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
