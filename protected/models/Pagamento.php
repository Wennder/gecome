<?php

Yii::import('application.models._base.BasePagamento');

class Pagamento extends BasePagamento
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}