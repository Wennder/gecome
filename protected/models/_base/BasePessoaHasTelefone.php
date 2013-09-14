<?php

/**
 * This is the model base class for the table "pessoa_has_telefone".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PessoaHasTelefone".
 *
 * Columns in table "pessoa_has_telefone" available as properties of the model,
 * followed by relations of table "pessoa_has_telefone" available as properties of the model.
 *
 * @property integer $id_pessoa_has_telefone
 * @property integer $id_pessoa_fisica
 * @property integer $id_pessoa_juridica
 * @property integer $id_telefone
 * @property integer $preferencial
 *
 * @property PessoaFisica $idPessoaFisica
 * @property PessoaJuridica $idPessoaJuridica
 * @property Telefone $idTelefone
 */
abstract class BasePessoaHasTelefone extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'pessoa_has_telefone';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PessoaHasTelefone|PessoaHasTelefones', $n);
	}

	public static function representingColumn() {
		return 'id_pessoa_has_telefone';
	}

	public function rules() {
		return array(
			array('id_telefone', 'required'),
			array('id_pessoa_fisica, id_pessoa_juridica, id_telefone, preferencial', 'numerical', 'integerOnly'=>true),
			array('id_pessoa_fisica, id_pessoa_juridica, preferencial', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_pessoa_has_telefone, id_pessoa_fisica, id_pessoa_juridica, id_telefone, preferencial', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idPessoaFisica' => array(self::BELONGS_TO, 'PessoaFisica', 'id_pessoa_fisica'),
			'idPessoaJuridica' => array(self::BELONGS_TO, 'PessoaJuridica', 'id_pessoa_juridica'),
			'idTelefone' => array(self::BELONGS_TO, 'Telefone', 'id_telefone'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_pessoa_has_telefone' => Yii::t('app', 'Id Pessoa Has Telefone'),
			'id_pessoa_fisica' => null,
			'id_pessoa_juridica' => null,
			'id_telefone' => null,
			'preferencial' => Yii::t('app', 'Preferencial'),
			'idPessoaFisica' => null,
			'idPessoaJuridica' => null,
			'idTelefone' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_pessoa_has_telefone', $this->id_pessoa_has_telefone);
		$criteria->compare('id_pessoa_fisica', $this->id_pessoa_fisica);
		$criteria->compare('id_pessoa_juridica', $this->id_pessoa_juridica);
		$criteria->compare('id_telefone', $this->id_telefone);
		$criteria->compare('preferencial', $this->preferencial);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}