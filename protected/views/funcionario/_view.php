<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_funcionario')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_funcionario), array('view', 'id' => $data->id_funcionario)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_fisica')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPessoaFisica)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_user')); ?>:
	<?php echo GxHtml::encode($data->id_user); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_criacao')); ?>:
	<?php echo GxHtml::encode($data->data_criacao); ?>
	<br />

</div>