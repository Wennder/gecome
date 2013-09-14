<?php

class CidadeController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Cidade'),
		));
	}

	public function actionCreate() {
		$model = new Cidade;


		if (isset($_POST['Cidade'])) {
			$model->setAttributes($_POST['Cidade']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_cidade));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Cidade');


		if (isset($_POST['Cidade'])) {
			$model->setAttributes($_POST['Cidade']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_cidade));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Cidade')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Cidade');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Cidade('search');
		$model->unsetAttributes();

		if (isset($_GET['Cidade']))
			$model->setAttributes($_GET['Cidade']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}