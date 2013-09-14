<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_has_endereco')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_pessoa_has_endereco), array('view', 'id' => $data->id_pessoa_has_endereco)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_fisica')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPessoaFisica)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_juridica')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPessoaJuridica)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_endereco')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idEndereco)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('preferencial')); ?>:
	<?php echo GxHtml::encode($data->preferencial); ?>
	<br />

</div>