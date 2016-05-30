<?php

/**
 * This is the model class for table "{{listner_group}}".
 *
 * The followings are the available columns in table '{{listner_group}}':
 * @property integer $id
 * @property string $name
 * @property string $time
 * @property integer $subject_id
 * @property integer $teacher_id
 *
 * The followings are the available model relations:
 * @property SubjectSubject $subject
 * @property UserTeacher $teacher
 * @property ListnerPosition[] $listnerPositions
 */
class Group extends yupe\models\YModel
{       
    
        public $number;
        public $hui;
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{listner_group}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, time,lvl', 'length', 'max'=>50),
			array('note', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, time, lvl, note, teacher_id, is_active', 'safe', 'on'=>'search'),
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
			'positions' => array(self::HAS_MANY, 'Position', 'group_id'),
                        'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
                        'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
                        'schedule' => array(self::HAS_MANY, 'Schedule', 'group_id'),
                        'position' => array(self::BELONGS_TO, 'Position', 'parent_id'),
						'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя группы',
			'time' => 'Время',
			'teacher_id'=>"Преподаватель",
			'form_id'=>'Форма обучения',
			'subject_id'=>'Предмет',
			'lvl'=>'Уровень',
			'note'=>'Комментарий',
			'is_active'=>'Статус',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('lvl',$this->lvl,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('note',$this->is_active,true);
		$criteria->compare('teacher_id',$this->teacher_id,true);
                $criteria->compare('is_active',$this->is_active,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Group the static model class
	 */
	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
        protected function afterSave() {
            parent::afterSave();
            if($this->isNewRecord){
                $this->position->group_id = $this->id;
                $this->position->code = $this->code;
                $this->position->update();
                $time = explode(',', $this->time);
                $tCount = count($time);
                $j = 0;
                $k = 0;
                for($i=0; $i<$this->number;$i++){
                    if($j==$tCount){
                        $j=0;
                        $k++;
                    }
                    $schedule = new Schedule;
                    $schedule->group_id = $this->id;
                    $schedule->number = $i+1;
                    $schedule->teacher_id= $this->teacher_id;
                    $schedule->start_time = str_replace(" ","T",date('Y-m-d H:i:s',strtotime("+".$k."week",strtotime($time[$j]))));
                    if ($this->hui=="on"){
                        $pizda = 30;
                    }else{
                        $pizda = 0;
                    }
                    $schedule->end_time = str_replace(" ","T",date('Y-m-d H:i:s',strtotime("+".$k."week 1 hours ".$pizda." minutes",strtotime($time[$j]))));
                    //die(var_dump($this->branch_id));
                    $schedule->room_id = $this->findRoom($schedule->start_time, $this->branch_id,count($this->positions));
                    if(!$schedule->save())
                    die(var_dump($schedule->getErrors()));
                    $j++;
                }
            }
        }
        
        
        public function getNext($id){
            return $this->model()->findBySql("SELECT * FROM spbp_listner_group t1"
                    . " JOIN spbp_listner_position t2 ON t2.group_id = t1.id WHERE t1.parent_group =$this->id AND t2.listner_id=$id");
        }
        public function getPrev($id){
            if($this->parent_group)
                return $this->model()->findBySql("SELECT * FROM spbp_listner_group t1"
                    . " JOIN spbp_listner_position t2 ON t2.group_id = t1.id WHERE t1.id =$this->parent_group AND t2.listner_id=$id");
            else
                return false;
        }
        protected function findRoom($t,$b,$x)
        {
            return Room::model()->findBySql(
                    "SELECT * FROM spbp_branch_room"
                    . " WHERE id <> ALL(SELECT t1.id FROM spbp_branch_room t1 "
                        . "JOIN spbp_listner_schedule t2 "
                            . "ON t2.room_id = t1.id WHERE t2.start_time = '$t')  "
                                . "AND branch_id = '$b' AND capacity>='$x' ORDER BY capacity")->id;
        }
}
