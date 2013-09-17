<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_departamento')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_departamento), array('view', 'id' => $data->id_departamento)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_criacao')); ?>:
	<?php echo GxHtml::encode($data->data_criacao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_telefone')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idTelefone)); ?>
	<br />

</div>