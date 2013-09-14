<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_fornecedor')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_fornecedor), array('view', 'id' => $data->id_fornecedor)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_juridica')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPessoaJuridica)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_endereco')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idEndereco)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('site')); ?>:
	<?php echo GxHtml::encode($data->site); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_criacao')); ?>:
	<?php echo GxHtml::encode($data->data_criacao); ?>
	<br />

</div>