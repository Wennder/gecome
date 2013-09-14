<?php

class PessoaHasTelefoneController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'PessoaHasTelefone'),
		));
	}

	public function actionCreate() {
		$model = new PessoaHasTelefone;


		if (isset($_POST['PessoaHasTelefone'])) {
			$model->setAttributes($_POST['PessoaHasTelefone']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_pessoa_has_telefone));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'PessoaHasTelefone');


		if (isset($_POST['PessoaHasTelefone'])) {
			$model->setAttributes($_POST['PessoaHasTelefone']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_pessoa_has_telefone));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'PessoaHasTelefone')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('PessoaHasTelefone');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new PessoaHasTelefone('search');
		$model->unsetAttributes();

		if (isset($_GET['PessoaHasTelefone']))
			$model->setAttributes($_GET['PessoaHasTelefone']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}