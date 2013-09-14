<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_departamento_has_funcionario')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_departamento_has_funcionario), array('view', 'id' => $data->id_departamento_has_funcionario)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_departamento')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idDepartamento)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_funcionario')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idFuncionario)); ?>
	<br />

</div>