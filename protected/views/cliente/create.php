<?php

$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Create'),
);
?>
<?php

$this->renderPartial('_form', array(
    'model' => $model,
    'model_pf' => $model_pf,
    'model_pj' => $model_pj,
    'buttons' => 'create'));
?>