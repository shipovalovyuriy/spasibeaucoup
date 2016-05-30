<?php

/**
 * This is the model class for table "{{listner_schedule}}".
 *
 * The followings are the available columns in table '{{listner_schedule}}':
 * @property integer $id
 * @property integer $position_id
 * @property integer $number
 * @property string $start_time
 * @property integer $room_id
 * @property string $end_time
 *
 * The followings are the available model relations:
 * @property Room $room
 * @property Position $position
 */
class Schedule extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{listner_schedule}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position_id, teacher_id, number, room_id', 'numerical', 'integerOnly'=>true),
			array('start_time', 'length', 'max'=>50),
			array('end_time', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, position_id, number, start_time, room_id, end_time', 'safe', 'on'=>'search'),
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
			'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
			'position' => array(self::BELONGS_TO, 'Position', 'position_id'),
                        'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
                        'teacher' => [self::BELONGS_TO, 'Teacher', 'teacher_id']
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'position_id' => 'Положение',
			'number' => 'Номер занятия',
			'start_time' => 'Время начала',
			'room_id' => 'Комната',
			'end_time' => 'Время конца',
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
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('number',$this->number);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('end_time',$this->end_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Schedule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function checkEdit(){
            $d1 = strtotime($this->start_time);
            $d2 = strtotime(date('c'));
            $diff = $d1-$d2;
            $diff = $diff/(60*60);
            $hours = floor($diff);
            if($hours>=24)
                return TRUE;
            else
                return FALSE;
        }
        public function getBranch() {
            $criteria = new CDbCriteria;
            if($this->position_id) {
                return $criteria->condition = 'branch_id='.$this->position->listner->branch_id;
            } else {
                return $criteria->condition = 'branch_id='.$this->group->teacher->branch_id;
            }
        }
        
        public function getSubject() {
            if($this->position_id) {
                return $this->position->subject_id;
            } else {
                return $this->group->subject_id;
            }
        }
}
