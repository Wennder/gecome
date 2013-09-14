<?php

Yii::import('application.models._base.BasePessoaFisica');

class PessoaFisica extends BasePessoaFisica
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}