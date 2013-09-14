<?php

class EnderecoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Endereco'),
		));
	}

	public function actionCreate() {
		$model = new Endereco;


		if (isset($_POST['Endereco'])) {
			$model->setAttributes($_POST['Endereco']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_endereco));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Endereco');


		if (isset($_POST['Endereco'])) {
			$model->setAttributes($_POST['Endereco']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_endereco));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Endereco')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Endereco');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Endereco('search');
		$model->unsetAttributes();

		if (isset($_GET['Endereco']))
			$model->setAttributes($_GET['Endereco']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}