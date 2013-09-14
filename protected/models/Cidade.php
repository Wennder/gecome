<?php

Yii::import('application.models._base.BaseCidade');

class Cidade extends BaseCidade
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}