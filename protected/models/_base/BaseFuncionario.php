<?php

/**
 * This is the model base class for the table "funcionario".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Funcionario".
 *
 * Columns in table "funcionario" available as properties of the model,
 * followed by relations of table "funcionario" available as properties of the model.
 *
 * @property integer $id_funcionario
 * @property integer $id_pessoa_fisica
 * @property integer $id_telefone
 * @property integer $id_endereco
 * @property string $id_user
 * @property string $data_criacao
 *
 * @property DepartamentoHasFuncionario[] $departamentoHasFuncionarios
 * @property Endereco $idEndereco
 * @property PessoaFisica $idPessoaFisica
 * @property Telefone $idTelefone
 */
abstract class BaseFuncionario extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'funcionario';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Funcionario|Funcionarios', $n);
	}

	public static function representingColumn() {
		return 'data_criacao';
	}

	public function rules() {
		return array(
			array('id_pessoa_fisica, id_telefone, id_endereco, data_criacao', 'required'),
			array('id_pessoa_fisica, id_telefone, id_endereco', 'numerical', 'integerOnly'=>true),
			array('id_user', 'length', 'max'=>20),
			array('id_user', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_funcionario, id_pessoa_fisica, id_telefone, id_endereco, id_user, data_criacao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'departamentoHasFuncionarios' => array(self::HAS_MANY, 'DepartamentoHasFuncionario', 'id_funcionario'),
			'idEndereco' => array(self::BELONGS_TO, 'Endereco', 'id_endereco'),
			'idPessoaFisica' => array(self::BELONGS_TO, 'PessoaFisica', 'id_pessoa_fisica'),
			'idTelefone' => array(self::BELONGS_TO, 'Telefone', 'id_telefone'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_funcionario' => Yii::t('app', 'Id Funcionario'),
			'id_pessoa_fisica' => null,
			'id_telefone' => null,
			'id_endereco' => null,
			'id_user' => Yii::t('app', 'Id User'),
			'data_criacao' => Yii::t('app', 'Data Criacao'),
			'departamentoHasFuncionarios' => null,
			'idEndereco' => null,
			'idPessoaFisica' => null,
			'idTelefone' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_funcionario', $this->id_funcionario);
		$criteria->compare('id_pessoa_fisica', $this->id_pessoa_fisica);
		$criteria->compare('id_telefone', $this->id_telefone);
		$criteria->compare('id_endereco', $this->id_endereco);
		$criteria->compare('id_user', $this->id_user, true);
		$criteria->compare('data_criacao', $this->data_criacao, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}