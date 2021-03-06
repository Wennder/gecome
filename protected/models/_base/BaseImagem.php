<?php

/**
 * This is the model base class for the table "imagem".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Imagem".
 *
 * Columns in table "imagem" available as properties of the model,
 * followed by relations of table "imagem" available as properties of the model.
 *
 * @property integer $id_imagem
 * @property string $caminho
 * @property string $nome
 * @property integer $principal
 * @property integer $id_produto
 *
 * @property Produto $idProduto
 */
abstract class BaseImagem extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'imagem';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Imagem|Imagems', $n);
	}

	public static function representingColumn() {
		return 'caminho';
	}

	public function rules() {
		return array(
			array('id_produto', 'required'),
			array('principal, id_produto', 'numerical', 'integerOnly'=>true),
			array('caminho, nome', 'length', 'max'=>120),
			array('caminho, nome, principal', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_imagem, caminho, nome, principal, id_produto', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idProduto' => array(self::BELONGS_TO, 'Produto', 'id_produto'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_imagem' => Yii::t('app', 'Id Imagem'),
			'caminho' => Yii::t('app', 'Caminho'),
			'nome' => Yii::t('app', 'Nome'),
			'principal' => Yii::t('app', 'Principal'),
			'id_produto' => null,
			'idProduto' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_imagem', $this->id_imagem);
		$criteria->compare('caminho', $this->caminho, true);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('principal', $this->principal);
		$criteria->compare('id_produto', $this->id_produto);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}