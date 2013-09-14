<?php

Yii::import('application.models._base.BaseDepartamento');

class Departamento extends BaseDepartamento
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}