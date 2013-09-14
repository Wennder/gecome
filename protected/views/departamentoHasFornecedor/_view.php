<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_departamento_has_fornecedor')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_departamento_has_fornecedor), array('view', 'id' => $data->id_departamento_has_fornecedor)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_departamento')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idDepartamento)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_fornecedor')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idFornecedor)); ?>
	<br />

</div>