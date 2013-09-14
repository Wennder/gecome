<?php

class TelefoneController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Telefone'),
		));
	}

	public function actionCreate() {
		$model = new Telefone;


		if (isset($_POST['Telefone'])) {
			$model->setAttributes($_POST['Telefone']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_telefone));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Telefone');


		if (isset($_POST['Telefone'])) {
			$model->setAttributes($_POST['Telefone']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_telefone));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Telefone')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Telefone');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Telefone('search');
		$model->unsetAttributes();

		if (isset($_GET['Telefone']))
			$model->setAttributes($_GET['Telefone']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}