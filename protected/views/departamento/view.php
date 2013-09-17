<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id_departamento)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_departamento), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id_departamento',
'nome',
'data_criacao',
array(
			'name' => 'idTelefone',
			'type' => 'raw',
			'value' => $model->idTelefone !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idTelefone)), array('telefone/view', 'id' => GxActiveRecord::extractPkValue($model->idTelefone, true))) : null,
			),
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('departamentoHasFornecedors')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->departamentoHasFornecedors as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('departamentoHasFornecedor/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('departamentoHasFuncionarios')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->departamentoHasFuncionarios as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('departamentoHasFuncionario/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>