<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'searchForm',
    'type' => 'search',
    'action' => '/gecome/site/search',
    'htmlOptions' => array('class' => 'well'),
        ));
?>
<div class="center" style="width: 446px;">
<?php echo $form->textFieldRow($model, 'search', array('class' => 'input-large span4', 'prepend' => '<i class="icon-search"></i>')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Go')); ?>
</div>
<?php $this->endWidget(); ?>