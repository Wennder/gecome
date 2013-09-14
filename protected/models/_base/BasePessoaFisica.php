<?php

/**
 * This is the model base class for the table "pessoa_fisica".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PessoaFisica".
 *
 * Columns in table "pessoa_fisica" available as properties of the model,
 * followed by relations of table "pessoa_fisica" available as properties of the model.
 *
 * @property integer $id_pessoa_fisica
 * @property string $nome
 * @property string $cpf
 * @property string $rg
 * @property string $data_nascimento
 * @property integer $sexo
 * @property string $email
 *
 * @property Cliente[] $clientes
 * @property Funcionario[] $funcionarios
 * @property PessoaHasEndereco[] $pessoaHasEnderecos
 * @property PessoaHasTelefone[] $pessoaHasTelefones
 */
abstract class BasePessoaFisica extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'pessoa_fisica';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PessoaFisica|PessoaFisicas', $n);
	}

	public static function representingColumn() {
		return 'nome';
	}

	public function rules() {
		return array(
			array('nome, cpf, data_nascimento, sexo, email', 'required'),
			array('sexo', 'numerical', 'integerOnly'=>true),
			array('nome, email', 'length', 'max'=>120),
			array('cpf', 'length', 'max'=>14),
			array('rg', 'length', 'max'=>10),
			array('rg', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_pessoa_fisica, nome, cpf, rg, data_nascimento, sexo, email', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'clientes' => array(self::HAS_MANY, 'Cliente', 'id_pessoa_fisica'),
			'funcionarios' => array(self::HAS_MANY, 'Funcionario', 'id_pessoa_fisica'),
			'pessoaHasEnderecos' => array(self::HAS_MANY, 'PessoaHasEndereco', 'id_pessoa_fisica'),
			'pessoaHasTelefones' => array(self::HAS_MANY, 'PessoaHasTelefone', 'id_pessoa_fisica'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_pessoa_fisica' => Yii::t('app', 'Id Pessoa Fisica'),
			'nome' => Yii::t('app', 'Nome'),
			'cpf' => Yii::t('app', 'Cpf'),
			'rg' => Yii::t('app', 'Rg'),
			'data_nascimento' => Yii::t('app', 'Data Nascimento'),
			'sexo' => Yii::t('app', 'Sexo'),
			'email' => Yii::t('app', 'Email'),
			'clientes' => null,
			'funcionarios' => null,
			'pessoaHasEnderecos' => null,
			'pessoaHasTelefones' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_pessoa_fisica', $this->id_pessoa_fisica);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('cpf', $this->cpf, true);
		$criteria->compare('rg', $this->rg, true);
		$criteria->compare('data_nascimento', $this->data_nascimento, true);
		$criteria->compare('sexo', $this->sexo);
		$criteria->compare('email', $this->email, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}