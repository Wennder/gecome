<?php

class TipoContatoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'TipoContato'),
		));
	}

	public function actionCreate() {
		$model = new TipoContato;


		if (isset($_POST['TipoContato'])) {
			$model->setAttributes($_POST['TipoContato']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_tipo_contato));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'TipoContato');


		if (isset($_POST['TipoContato'])) {
			$model->setAttributes($_POST['TipoContato']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_tipo_contato));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'TipoContato')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('TipoContato');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new TipoContato('search');
		$model->unsetAttributes();

		if (isset($_GET['TipoContato']))
			$model->setAttributes($_GET['TipoContato']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}