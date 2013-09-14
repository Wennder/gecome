<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id_pessoa_juridica'); ?>
		<?php echo $form->textField($model, 'id_pessoa_juridica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'razao_social'); ?>
		<?php echo $form->textField($model, 'razao_social', array('maxlength' => 120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nome_fantasia'); ?>
		<?php echo $form->textField($model, 'nome_fantasia', array('maxlength' => 120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cnpj'); ?>
		<?php echo $form->textField($model, 'cnpj', array('maxlength' => 18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'insc_estadual'); ?>
		<?php echo $form->textField($model, 'insc_estadual', array('maxlength' => 8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 120)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
