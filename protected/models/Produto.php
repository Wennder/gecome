<?php

Yii::import('application.models._base.BaseProduto');

class Produto extends BaseProduto
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}