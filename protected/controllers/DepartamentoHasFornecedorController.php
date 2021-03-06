<?php

class DepartamentoHasFornecedorController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'DepartamentoHasFornecedor'),
		));
	}

	public function actionCreate() {
		$model = new DepartamentoHasFornecedor;


		if (isset($_POST['DepartamentoHasFornecedor'])) {
			$model->setAttributes($_POST['DepartamentoHasFornecedor']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_departamento_has_fornecedor));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'DepartamentoHasFornecedor');


		if (isset($_POST['DepartamentoHasFornecedor'])) {
			$model->setAttributes($_POST['DepartamentoHasFornecedor']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_departamento_has_fornecedor));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'DepartamentoHasFornecedor')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('DepartamentoHasFornecedor');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new DepartamentoHasFornecedor('search');
		$model->unsetAttributes();

		if (isset($_GET['DepartamentoHasFornecedor']))
			$model->setAttributes($_GET['DepartamentoHasFornecedor']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}