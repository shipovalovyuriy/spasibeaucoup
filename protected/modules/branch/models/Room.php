<?php

/**
 * This is the model class for table "{{branch_room}}".
 *
 * The followings are the available columns in table '{{branch_room}}':
 * @property integer $id
 * @property integer $branch_id
 * @property string $alias
 * @property integer $capacity
 *
 * The followings are the available model relations:
 * @property BranchBranch $branch
 */
class Room extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{branch_room}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('branch_id, alias, capacity', 'required'),
			array('branch_id, capacity', 'numerical', 'integerOnly'=>true),
			array('alias', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, branch_id, alias, capacity', 'safe', 'on'=>'search'),
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
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
                        'schedule' => array(self::HAS_MANY, 'Schedule', 'room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'branch_id' => 'Филиал',
			'alias' => 'Название',
			'capacity' => 'Вместимость',
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
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('capacity',$this->capacity);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BranchRoom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
