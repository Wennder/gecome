<?php

/**
 * This is the model base class for the table "compra".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Compra".
 *
 * Columns in table "compra" available as properties of the model,
 * followed by relations of table "compra" available as properties of the model.
 *
 * @property integer $id_compra
 * @property string $codigo
 * @property string $valor
 * @property string $data_compra
 * @property integer $id_tipo_pagamento
 * @property integer $id_cliente
 * @property integer $id_status_compra
 *
 * @property TipoPagamento $idTipoPagamento
 * @property Cliente $idCliente
 * @property StatusCompra $idStatusCompra
 * @property CompraHasProduto[] $compraHasProdutos
 * @property Pagamento[] $pagamentos
 */
abstract class BaseCompra extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'compra';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Compra|Compras', $n);
	}

	public static function representingColumn() {
		return 'valor';
	}

	public function rules() {
		return array(
			array('valor, data_compra, id_tipo_pagamento, id_cliente, id_status_compra', 'required'),
			array('id_tipo_pagamento, id_cliente, id_status_compra', 'numerical', 'integerOnly'=>true),
			array('codigo', 'length', 'max'=>20),
			array('valor', 'length', 'max'=>6),
			array('codigo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_compra, codigo, valor, data_compra, id_tipo_pagamento, id_cliente, id_status_compra', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idTipoPagamento' => array(self::BELONGS_TO, 'TipoPagamento', 'id_tipo_pagamento'),
			'idCliente' => array(self::BELONGS_TO, 'Cliente', 'id_cliente'),
			'idStatusCompra' => array(self::BELONGS_TO, 'StatusCompra', 'id_status_compra'),
			'compraHasProdutos' => array(self::HAS_MANY, 'CompraHasProduto', 'id_compra'),
			'pagamentos' => array(self::HAS_MANY, 'Pagamento', 'id_compra'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_compra' => Yii::t('app', 'Id Compra'),
			'codigo' => Yii::t('app', 'Codigo'),
			'valor' => Yii::t('app', 'Valor'),
			'data_compra' => Yii::t('app', 'Data Compra'),
			'id_tipo_pagamento' => null,
			'id_cliente' => null,
			'id_status_compra' => null,
			'idTipoPagamento' => null,
			'idCliente' => null,
			'idStatusCompra' => null,
			'compraHasProdutos' => null,
			'pagamentos' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_compra', $this->id_compra);
		$criteria->compare('codigo', $this->codigo, true);
		$criteria->compare('valor', $this->valor, true);
		$criteria->compare('data_compra', $this->data_compra, true);
		$criteria->compare('id_tipo_pagamento', $this->id_tipo_pagamento);
		$criteria->compare('id_cliente', $this->id_cliente);
		$criteria->compare('id_status_compra', $this->id_status_compra);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}