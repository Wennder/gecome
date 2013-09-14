<?php

Yii::import('application.models._base.BaseDepartamentoHasFornecedor');

class DepartamentoHasFornecedor extends BaseDepartamentoHasFornecedor
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}