<?php

class EstadoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Estado'),
		));
	}

	public function actionCreate() {
		$model = new Estado;


		if (isset($_POST['Estado'])) {
			$model->setAttributes($_POST['Estado']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_estado));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Estado');


		if (isset($_POST['Estado'])) {
			$model->setAttributes($_POST['Estado']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_estado));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Estado')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Estado');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Estado('search');
		$model->unsetAttributes();

		if (isset($_GET['Estado']))
			$model->setAttributes($_GET['Estado']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}