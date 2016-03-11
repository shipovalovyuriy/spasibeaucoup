<?php

/**
 * This is the model class for table "{{balance_inflow}}".
 *
 * The followings are the available columns in table '{{balance_inflow}}':
 * @property integer $id
 * @property integer $subj_id
 * @property string $receiver
 * @property string $price
 * @property string $based
 * @property string $comment
 * @property string $date
 *
 * The followings are the available model relations:
 * @property SubjectSubject $subj
 */
class Inflow extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{balance_inflow}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subj_id', 'numerical', 'integerOnly'=>true),
			array('receiver, based, date', 'length', 'max'=>50),
			array('price', 'length', 'max'=>20),
			array('comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subj_id, receiver, price, based, comment, date', 'safe', 'on'=>'search'),
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
			'subj' => array(self::BELONGS_TO, 'Subject', 'subj_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subj_id' => 'Subj',
			'receiver' => 'Receiver',
			'price' => 'Price',
			'based' => 'Based',
			'comment' => 'Comment',
			'date' => 'Date',
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
		$criteria->compare('subj_id',$this->subj_id);
		$criteria->compare('receiver',$this->receiver,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('based',$this->based,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inflow the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
