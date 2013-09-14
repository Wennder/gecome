<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_estado')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_estado), array('view', 'id' => $data->id_estado)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('uf')); ?>:
	<?php echo GxHtml::encode($data->uf); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_pais')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPais)); ?>
	<br />

</div>