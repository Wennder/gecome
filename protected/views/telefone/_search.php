<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id_telefone'); ?>
		<?php echo $form->textField($model, 'id_telefone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tipo'); ?>
		<?php echo $form->dropDownList($model, 'tipo', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'numero'); ?>
		<?php echo $form->textField($model, 'numero', array('maxlength' => 13)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
