<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_juridica')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_pessoa_juridica), array('view', 'id' => $data->id_pessoa_juridica)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('razao_social')); ?>:
	<?php echo GxHtml::encode($data->razao_social); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nome_fantasia')); ?>:
	<?php echo GxHtml::encode($data->nome_fantasia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cnpj')); ?>:
	<?php echo GxHtml::encode($data->cnpj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('insc_estadual')); ?>:
	<?php echo GxHtml::encode($data->insc_estadual); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />

</div>