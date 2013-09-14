<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_endereco')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_endereco), array('view', 'id' => $data->id_endereco)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cep')); ?>:
	<?php echo GxHtml::encode($data->cep); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tipo')); ?>:
	<?php echo GxHtml::encode($data->tipo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rua')); ?>:
	<?php echo GxHtml::encode($data->rua); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('numero')); ?>:
	<?php echo GxHtml::encode($data->numero); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('complemento')); ?>:
	<?php echo GxHtml::encode($data->complemento); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('descricao')); ?>:
	<?php echo GxHtml::encode($data->descricao); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('bairro')); ?>:
	<?php echo GxHtml::encode($data->bairro); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_cidade')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCidade)); ?>
	<br />
	*/ ?>

</div>