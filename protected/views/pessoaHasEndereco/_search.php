<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id_pessoa_has_endereco'); ?>
		<?php echo $form->textField($model, 'id_pessoa_has_endereco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_pessoa_fisica'); ?>
		<?php echo $form->dropDownList($model, 'id_pessoa_fisica', GxHtml::listDataEx(PessoaFisica::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
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
		<?php echo $form->label($model, 'preferencial'); ?>
		<?php echo $form->dropDownList($model, 'preferencial', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
