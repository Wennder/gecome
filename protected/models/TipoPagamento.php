<?php

Yii::import('application.models._base.BaseTipoPagamento');

class TipoPagamento extends BaseTipoPagamento
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}