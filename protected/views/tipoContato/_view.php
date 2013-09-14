<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_tipo_contato')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_tipo_contato), array('view', 'id' => $data->id_tipo_contato)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('area')); ?>:
	<?php echo GxHtml::encode($data->area); ?>
	<br />

</div>