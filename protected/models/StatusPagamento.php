<?php

Yii::import('application.models._base.BaseStatusPagamento');

class StatusPagamento extends BaseStatusPagamento
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}