<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id_funcionario)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_funcionario), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id_funcionario',
array(
			'name' => 'idPessoaFisica',
			'type' => 'raw',
			'value' => $model->idPessoaFisica !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idPessoaFisica)), array('pessoaFisica/view', 'id' => GxActiveRecord::extractPkValue($model->idPessoaFisica, true))) : null,
			),
'id_user',
'data_criacao',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('departamentoHasFuncionarios')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->departamentoHasFuncionarios as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('departamentoHasFuncionario/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>