<?php

class PessoaJuridicaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'PessoaJuridica'),
		));
	}

	public function actionCreate() {
		$model = new PessoaJuridica;


		if (isset($_POST['PessoaJuridica'])) {
			$model->setAttributes($_POST['PessoaJuridica']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_pessoa_juridica));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'PessoaJuridica');


		if (isset($_POST['PessoaJuridica'])) {
			$model->setAttributes($_POST['PessoaJuridica']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_pessoa_juridica));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'PessoaJuridica')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('PessoaJuridica');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new PessoaJuridica('search');
		$model->unsetAttributes();

		if (isset($_GET['PessoaJuridica']))
			$model->setAttributes($_GET['PessoaJuridica']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}