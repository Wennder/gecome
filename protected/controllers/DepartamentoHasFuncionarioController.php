<?php

class DepartamentoHasFuncionarioController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'DepartamentoHasFuncionario'),
		));
	}

	public function actionCreate() {
		$model = new DepartamentoHasFuncionario;


		if (isset($_POST['DepartamentoHasFuncionario'])) {
			$model->setAttributes($_POST['DepartamentoHasFuncionario']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_departamento_has_funcionario));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'DepartamentoHasFuncionario');


		if (isset($_POST['DepartamentoHasFuncionario'])) {
			$model->setAttributes($_POST['DepartamentoHasFuncionario']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_departamento_has_funcionario));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'DepartamentoHasFuncionario')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('DepartamentoHasFuncionario');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new DepartamentoHasFuncionario('search');
		$model->unsetAttributes();

		if (isset($_GET['DepartamentoHasFuncionario']))
			$model->setAttributes($_GET['DepartamentoHasFuncionario']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}