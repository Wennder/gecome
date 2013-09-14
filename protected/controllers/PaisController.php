<?php

class PaisController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Pais'),
		));
	}

	public function actionCreate() {
		$model = new Pais;


		if (isset($_POST['Pais'])) {
			$model->setAttributes($_POST['Pais']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_pais));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Pais');


		if (isset($_POST['Pais'])) {
			$model->setAttributes($_POST['Pais']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_pais));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Pais')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Pais');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Pais('search');
		$model->unsetAttributes();

		if (isset($_GET['Pais']))
			$model->setAttributes($_GET['Pais']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}