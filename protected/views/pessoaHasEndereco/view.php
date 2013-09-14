<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id_pessoa_has_endereco)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_pessoa_has_endereco), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id_pessoa_has_endereco',
array(
			'name' => 'idPessoaFisica',
			'type' => 'raw',
			'value' => $model->idPessoaFisica !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idPessoaFisica)), array('pessoaFisica/view', 'id' => GxActiveRecord::extractPkValue($model->idPessoaFisica, true))) : null,
			),
array(
			'name' => 'idPessoaJuridica',
			'type' => 'raw',
			'value' => $model->idPessoaJuridica !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idPessoaJuridica)), array('pessoaJuridica/view', 'id' => GxActiveRecord::extractPkValue($model->idPessoaJuridica, true))) : null,
			),
array(
			'name' => 'idEndereco',
			'type' => 'raw',
			'value' => $model->idEndereco !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idEndereco)), array('endereco/view', 'id' => GxActiveRecord::extractPkValue($model->idEndereco, true))) : null,
			),
'preferencial:boolean',
	),
)); ?>

