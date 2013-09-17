<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_telefone')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_telefone), array('view', 'id' => $data->id_telefone)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('tipo')); ?>:
	<?php echo GxHtml::encode($data->tipo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('numero')); ?>:
	<?php echo GxHtml::encode($data->numero); ?>
	<br />

</div>