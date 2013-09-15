<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Create'),
);
?>

<?php if (isset($erros) && count($erros)) {
    $this->widget('bootstrap.widgets.TbBox', array(
        'title' => 'Por favor, corrija os seguintes erros',
        'headerIcon' => 'icon-thumbs-down',
        'content' => $this->renderPartial('/site/_error', array('erros' => $erros), true),
        'htmlContentOptions' => array(
            'style' => 'background: #ff575b;'
        )
    ));
} ?>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'model_pf' => $model_pf,
    'model_pj' => $model_pj,
    'model_endereco' => $model_endereco,
    'buttons' => 'create'));
?>