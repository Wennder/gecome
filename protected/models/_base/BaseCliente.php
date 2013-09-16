<?php

/**
 * This is the model base class for the table "cliente".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Cliente".
 *
 * Columns in table "cliente" available as properties of the model,
 * followed by relations of table "cliente" available as properties of the model.
 *
 * @property integer $id_cliente
 * @property integer $id_pessoa_fisica
 * @property integer $id_pessoa_juridica
 * @property string $id_user
 * @property string $data_criacao
 *
 * @property PessoaFisica $idPessoaFisica
 * @property PessoaJuridica $idPessoaJuridica
 */
abstract class BaseCliente extends GxActiveRecord {

        public $tipo = 0; //0 pf, 1 pj
        
        public $telefones = array();
        
        public $username;
        
        public $email;
        
        public $senha;
        
        public $confirma_senha;
    
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'cliente';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Cliente|Clientes', $n);
	}

	public static function representingColumn() {
		return 'data_criacao';
	}

	public function rules() {
		return array(
			array('id_user, data_criacao, email, username, senha, confirma_senha', 'required'),
			array('id_pessoa_fisica, id_pessoa_juridica', 'numerical', 'integerOnly'=>true),
			array('id_user', 'length', 'max'=>20),
			array('id_pessoa_fisica, id_pessoa_juridica', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_cliente, id_pessoa_fisica, id_pessoa_juridica, id_user, data_criacao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idPessoaFisica' => array(self::BELONGS_TO, 'PessoaFisica', 'id_pessoa_fisica'),
			'idPessoaJuridica' => array(self::BELONGS_TO, 'PessoaJuridica', 'id_pessoa_juridica'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_cliente' => Yii::t('app', 'Id Cliente'),
			'id_pessoa_fisica' => null,
			'id_pessoa_juridica' => null,
			'id_user' => Yii::t('app', 'Id Usuário'),
			'data_criacao' => Yii::t('app', 'Data Criação'),
			'idPessoaFisica' => null,
			'idPessoaJuridica' => null,
                        'username' => 'Usuário',
                        'email' => 'E-mail',
                        'senha' => 'Senha',
                        'confirma_senha' => 'Confirma Senha',
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_cliente', $this->id_cliente);
		$criteria->compare('id_pessoa_fisica', $this->id_pessoa_fisica);
		$criteria->compare('id_pessoa_juridica', $this->id_pessoa_juridica);
		$criteria->compare('id_user', $this->id_user, true);
		$criteria->compare('data_criacao', $this->data_criacao, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}