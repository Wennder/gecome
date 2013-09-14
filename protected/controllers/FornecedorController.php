<?php

class FornecedorController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Fornecedor'),
		));
	}

	public function actionCreate() {
		$model = new Fornecedor;


		if (isset($_POST['Fornecedor'])) {
			$model->setAttributes($_POST['Fornecedor']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_fornecedor));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Fornecedor');


		if (isset($_POST['Fornecedor'])) {
			$model->setAttributes($_POST['Fornecedor']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_fornecedor));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Fornecedor')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Fornecedor');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Fornecedor('search');
		$model->unsetAttributes();

		if (isset($_GET['Fornecedor']))
			$model->setAttributes($_GET['Fornecedor']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}