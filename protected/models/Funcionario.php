<?php

Yii::import('application.models._base.BaseFuncionario');

class Funcionario extends BaseFuncionario
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}