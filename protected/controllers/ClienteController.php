<?php

class ClienteController extends GxController {

    public function filters() {
        return array(
            'userGroupsAccessControl',
        );
    }

    public function accessRules() {
        return array(
        );
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Cliente'),
        ));
    }

    public function actionCreate() {
        $model = new Cliente;
        $model_pf = new PessoaFisica;
        $model_pj = new PessoaJuridica;

//        if (isset($_POST['Cliente']['telefones'])) {
//            foreach($_POST['Cliente']['telefones']['numero'] as $telefone) {
//                echo $telefone;
//            }
//        }

        if (isset($_POST['Cliente'])) {
            $model->setAttributes($_POST['Cliente']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->id_cliente));
            }
        }

        $this->render('create', array('model' => $model, 'model_pf' => $model_pf, 'model_pj' => $model_pj));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Cliente');


        if (isset($_POST['Cliente'])) {
            $model->setAttributes($_POST['Cliente']);

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_cliente));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Cliente')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Cliente');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Cliente('search');
        $model->unsetAttributes();

        if (isset($_GET['Cliente']))
            $model->setAttributes($_GET['Cliente']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}