<?php

Yii::import('application.models._base.BaseCompraHasProduto');

class CompraHasProduto extends BaseCompraHasProduto
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}