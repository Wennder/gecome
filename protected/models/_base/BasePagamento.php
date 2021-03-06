<?php

/**
 * This is the model base class for the table "pagamento".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Pagamento".
 *
 * Columns in table "pagamento" available as properties of the model,
 * followed by relations of table "pagamento" available as properties of the model.
 *
 * @property integer $id_pagamento
 * @property string $valor
 * @property string $data_vencimento
 * @property string $data_pagamento
 * @property integer $id_compra
 * @property integer $id_status_pagamento
 *
 * @property Compra $idCompra
 * @property StatusPagamento $idStatusPagamento
 */
abstract class BasePagamento extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'pagamento';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Pagamento|Pagamentos', $n);
	}

	public static function representingColumn() {
		return 'valor';
	}

	public function rules() {
		return array(
			array('valor, data_vencimento, id_compra, id_status_pagamento', 'required'),
			array('id_compra, id_status_pagamento', 'numerical', 'integerOnly'=>true),
			array('valor', 'length', 'max'=>6),
			array('data_pagamento', 'safe'),
			array('data_pagamento', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_pagamento, valor, data_vencimento, data_pagamento, id_compra, id_status_pagamento', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idCompra' => array(self::BELONGS_TO, 'Compra', 'id_compra'),
			'idStatusPagamento' => array(self::BELONGS_TO, 'StatusPagamento', 'id_status_pagamento'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_pagamento' => Yii::t('app', 'Id Pagamento'),
			'valor' => Yii::t('app', 'Valor'),
			'data_vencimento' => Yii::t('app', 'Data Vencimento'),
			'data_pagamento' => Yii::t('app', 'Data Pagamento'),
			'id_compra' => null,
			'id_status_pagamento' => null,
			'idCompra' => null,
			'idStatusPagamento' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_pagamento', $this->id_pagamento);
		$criteria->compare('valor', $this->valor, true);
		$criteria->compare('data_vencimento', $this->data_vencimento, true);
		$criteria->compare('data_pagamento', $this->data_pagamento, true);
		$criteria->compare('id_compra', $this->id_compra);
		$criteria->compare('id_status_pagamento', $this->id_status_pagamento);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}