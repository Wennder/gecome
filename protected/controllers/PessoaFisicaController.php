<?php

class PessoaFisicaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'PessoaFisica'),
		));
	}

	public function actionCreate() {
		$model = new PessoaFisica;


		if (isset($_POST['PessoaFisica'])) {
			$model->setAttributes($_POST['PessoaFisica']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_pessoa_fisica));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'PessoaFisica');


		if (isset($_POST['PessoaFisica'])) {
			$model->setAttributes($_POST['PessoaFisica']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_pessoa_fisica));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'PessoaFisica')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('PessoaFisica');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new PessoaFisica('search');
		$model->unsetAttributes();

		if (isset($_GET['PessoaFisica']))
			$model->setAttributes($_GET['PessoaFisica']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}