<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pais')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_pais), array('view', 'id' => $data->id_pais)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />

</div>