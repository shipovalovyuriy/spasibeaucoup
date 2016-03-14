<?php

/**
 * This is the model class for table "{{balance_outflow}}".
 *
 * The followings are the available columns in table '{{balance_outflow}}':
 * @property integer $id
 * @property integer $cost_id
 * @property string $receiver
 * @property string $date
 * @property string $price
 * @property string $based
 * @property string $note
 *
 * The followings are the available model relations:
 * @property BalanceCost $cost
 */
Yii::import('application.modules.balance.models.Cost');

class Outflow extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{balance_outflow}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('receiver, price, based, note', 'required'),
			array('cost_id', 'numerical', 'integerOnly'=>true),
			array('receiver, price, based, note', 'length', 'max'=>50),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cost_id, receiver, date, price, based, note', 'safe', 'on'=>'search'),
			
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cost' => array(self::BELONGS_TO, 'Cost', 'cost_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cost_id' => 'Cost',
			'receiver' => 'Receiver',
			'date' => 'Date',
			'price' => 'Price',
			'based' => 'Based',
			'note' => 'Note',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cost_id',$this->cost_id);
		$criteria->compare('receiver',$this->receiver,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('based',$this->based,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Outflow the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
