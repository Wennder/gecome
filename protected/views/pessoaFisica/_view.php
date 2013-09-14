<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_pessoa_fisica')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_pessoa_fisica), array('view', 'id' => $data->id_pessoa_fisica)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cpf')); ?>:
	<?php echo GxHtml::encode($data->cpf); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rg')); ?>:
	<?php echo GxHtml::encode($data->rg); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('data_nascimento')); ?>:
	<?php echo GxHtml::encode($data->data_nascimento); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sexo')); ?>:
	<?php echo GxHtml::encode($data->sexo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />

</div>