<?php

class FuncionarioController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Funcionario'),
		));
	}

	public function actionCreate() {
		$model = new Funcionario;


		if (isset($_POST['Funcionario'])) {
			$model->setAttributes($_POST['Funcionario']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_funcionario));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Funcionario');


		if (isset($_POST['Funcionario'])) {
			$model->setAttributes($_POST['Funcionario']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_funcionario));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Funcionario')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Funcionario');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Funcionario('search');
		$model->unsetAttributes();

		if (isset($_GET['Funcionario']))
			$model->setAttributes($_GET['Funcionario']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}