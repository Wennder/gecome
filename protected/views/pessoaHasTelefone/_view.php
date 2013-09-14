<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_has_telefone')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_pessoa_has_telefone), array('view', 'id' => $data->id_pessoa_has_telefone)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_fisica')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPessoaFisica)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_juridica')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPessoaJuridica)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_telefone')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idTelefone)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('preferencial')); ?>:
	<?php echo GxHtml::encode($data->preferencial); ?>
	<br />

</div>