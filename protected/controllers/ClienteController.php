<?php

class ClienteController extends GxController {

    public function filters() {
        return array(
            'userGroupsAccessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow guests to perform 'create' actions
                'actions' => array('create'),
                'users' => array('?'),
            ),
            array('allow', // allow pbac 'admin' to perform 'create' actions
                'actions' => array('create'),
                'pbac' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
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
        $model_endereco = new Endereco;

        //confere user
        if (isset($_POST['Cliente'])) {
            $model->tipo = $_POST['Cliente']['tipo'];

            if (isset($_POST['Cliente']['username']) && $_POST['Cliente']['username']) {
                $model->username = trim($_POST['Cliente']['username']);
                if (strlen($model->username) < 4 || strlen($model->username) > 10) {
                    $erros[] = "O nome de usuário deve ter de 4 a 10 caracteres, somente letras e números, e iniciar com uma letra.";
                }
            } else {
                $erros[] = "Nome de usuário inválido.";
            }

            if (isset($_POST['Cliente']['email']) && $_POST['Cliente']['email']) {
                $model->email = trim($_POST['Cliente']['email']);
                if (!filter_var($model->email, FILTER_VALIDATE_EMAIL)) {
                    $erros[] = "E-mail inválido.";
                }
            } else {
                $erros[] = "E-mail inválido.";
            }

            if (isset($_POST['Cliente']['senha']) && isset($_POST['Cliente']['confirma_senha']) && $_POST['Cliente']['senha'] && $_POST['Cliente']['confirma_senha']) {
                $model->senha = trim($_POST['Cliente']['senha']);
                $model->confirma_senha = trim($_POST['Cliente']['confirma_senha']);
                if (!preg_match('/^(?=.*[a-zA-Z0-9]).{5,}$/', $model->senha)) {
                    $erros[] = "A senha deve ter de 5 a 8 caracteres, somente letras e números.";
                } else if ($model->senha !== $model->confirma_senha) {
                    $erros[] = "Confirmação de senha não confere.";
                }
            } else {
                $erros[] = "Senha inválida.";
            }

            if (!isset($erros)) {
                
                
                $model_user = new UserGroupsUser;
                $model_user->setScenario('admin');
                $model_user->group_id = 4; //cliente
                $model_user->status = 4; //ativo
                $model_user->username = $model->username;
                $model_user->email = $model->email;
                $model_user->password = $model->senha;
                
                if (!$model_user->save()) {
                    echo $model_user->errors;
                } exit;
            }
        }
//        if (isset($_POST['Cliente']['telefones'])) {
//            foreach($_POST['Cliente']['telefones']['numero'] as $telefone) {
//                echo $telefone;
//            }
//        }
//        if (isset($_POST['Endereco'])) {
//            echo $_POST['Endereco']['id_cidade'];
//            exit;
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

        if (!isset($erros))
            $erros = array();

        $this->render('create', array('model' => $model, 'model_pf' => $model_pf, 'model_pj' => $model_pj, 'model_endereco' => $model_endereco, 'erros' => $erros));
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