<?php

/**
 * This is the model base class for the table "departamento".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Departamento".
 *
 * Columns in table "departamento" available as properties of the model,
 * followed by relations of table "departamento" available as properties of the model.
 *
 * @property integer $id_departamento
 * @property string $nome
 * @property string $data_criacao
 *
 * @property DepartamentoHasFornecedor[] $departamentoHasFornecedors
 * @property DepartamentoHasFuncionario[] $departamentoHasFuncionarios
 */
abstract class BaseDepartamento extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'departamento';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Departamento|Departamentos', $n);
	}

	public static function representingColumn() {
		return 'nome';
	}

	public function rules() {
		return array(
			array('nome, data_criacao', 'required'),
			array('nome', 'length', 'max'=>120),
			array('id_departamento, nome, data_criacao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'departamentoHasFornecedors' => array(self::HAS_MANY, 'DepartamentoHasFornecedor', 'id_departamento'),
			'departamentoHasFuncionarios' => array(self::HAS_MANY, 'DepartamentoHasFuncionario', 'id_departamento'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_departamento' => Yii::t('app', 'Id Departamento'),
			'nome' => Yii::t('app', 'Nome'),
			'data_criacao' => Yii::t('app', 'Data Criacao'),
			'departamentoHasFornecedors' => null,
			'departamentoHasFuncionarios' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_departamento', $this->id_departamento);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('data_criacao', $this->data_criacao, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}