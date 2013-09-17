<?php

/**
 * This is the model base class for the table "fornecedor".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Fornecedor".
 *
 * Columns in table "fornecedor" available as properties of the model,
 * followed by relations of table "fornecedor" available as properties of the model.
 *
 * @property integer $id_fornecedor
 * @property integer $id_pessoa_juridica
 * @property string $site
 * @property string $data_criacao
 *
 * @property Contato[] $contatos
 * @property DepartamentoHasFornecedor[] $departamentoHasFornecedors
 * @property PessoaJuridica $idPessoaJuridica
 */
abstract class BaseFornecedor extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'fornecedor';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Fornecedor|Fornecedors', $n);
	}

	public static function representingColumn() {
		return 'data_criacao';
	}

	public function rules() {
		return array(
			array('id_pessoa_juridica, data_criacao', 'required'),
			array('id_pessoa_juridica', 'numerical', 'integerOnly'=>true),
			array('site', 'length', 'max'=>120),
			array('site', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_fornecedor, id_pessoa_juridica, site, data_criacao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'contatos' => array(self::HAS_MANY, 'Contato', 'id_fornecedor'),
			'departamentoHasFornecedors' => array(self::HAS_MANY, 'DepartamentoHasFornecedor', 'id_fornecedor'),
			'idPessoaJuridica' => array(self::BELONGS_TO, 'PessoaJuridica', 'id_pessoa_juridica'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_fornecedor' => Yii::t('app', 'Id Fornecedor'),
			'id_pessoa_juridica' => null,
			'site' => Yii::t('app', 'Site'),
			'data_criacao' => Yii::t('app', 'Data Criacao'),
			'contatos' => null,
			'departamentoHasFornecedors' => null,
			'idPessoaJuridica' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_fornecedor', $this->id_fornecedor);
		$criteria->compare('id_pessoa_juridica', $this->id_pessoa_juridica);
		$criteria->compare('site', $this->site, true);
		$criteria->compare('data_criacao', $this->data_criacao, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}