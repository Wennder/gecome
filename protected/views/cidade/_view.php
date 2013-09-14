<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_cidade')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_cidade), array('view', 'id' => $data->id_cidade)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_estado')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idEstado)); ?>
	<br />

</div>