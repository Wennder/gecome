<?php

Yii::import('application.models._base.BaseFornecedor');

class Fornecedor extends BaseFornecedor
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}