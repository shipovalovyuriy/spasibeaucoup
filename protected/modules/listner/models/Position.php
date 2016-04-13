<?php

/**
 * This is the model class for table "{{listner_position}}".
 *
 * The followings are the available columns in table '{{listner_position}}':
 * @property integer $id
 * @property string $code
 * @property integer $form_id
 * @property integer $listner_id
 * @property integer $teacher_id
 * @property integer $subject_id
 * @property integer $group_id
 * @property string $lvl
 * @property string $note
 * @property string $time
 * @property string $start_date
 *
 * The followings are the available model relations:
 * @property ListnerListner $listner
 * @property FormForm $form
 * @property ListnerGroup $group
 * @property SubjectSubject $subject
 * @property UserTeacher $teacher
 * @property ListnerSchedule[] $listnerSchedules
 */
Yii::import('application.modules.balance.models.Inflow');
class Position extends yupe\models\YModel
{
    public  $type;
    private static  $_days = [
            'Воскресенье',
            'Понедельник',
            'Вторник',
            'Среда',
            'Четверг',
            'Пятница',
            'Суббота'
        ];
        private static $_month = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь',
        ];
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{listner_position}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('start_date, form_id, teacher_id, code, time, subject_id, lvl, type', 'required'),
			array('form_id, listner_id, teacher_id, subject_id, group_id', 'numerical', 'integerOnly'=>true),
			array('code, lvl,start_period,end_period', 'length', 'max'=>50),
			array('note, time,start_period,end_period', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, form_id, listner_id, teacher_id, subject_id, group_id, lvl, note, time, start_date,,start_period,end_period', 'safe', 'on'=>'search'),
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
			'listner' => array(self::BELONGS_TO, 'Listner', 'listner_id'),
			'form' => array(self::BELONGS_TO, 'Form', 'form_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
			'schedule' => array(self::HAS_MANY, 'Schedule', 'position_id'),
		);
	}

        protected function afterSave() 
        {
            if($this->isNewRecord && $this->is_test==0){
                //Формирование расписания пользователя
                if(!$this->group_id){
                    $time = explode(',', $this->time);
                    $tCount = count($time);
                    $j = 0;
                    $k = 0;
                    for($i=0; $i<$this->form->number;$i++){
                        if($j==$tCount){
                            $j=0;
                            $k++;
                        }
                        $schedule = new Schedule;
                        $schedule->position_id = $this->id;
                        $schedule->number = $i+1;
                        $schedule->start_time = str_replace(" ","T",date('Y-m-d H:i:s',strtotime("+".$k."week",strtotime($time[$j]))));
                        $schedule->end_time = str_replace(" ","T",date('Y-m-d H:i:s',strtotime("+".$k."week 1 hours",strtotime($time[$j]))));
                        $schedule->room_id = $this->findRoom($schedule->start_time);
                        if(!$schedule->save()) die(var_dump ($schedule->getErrors()));
                        $j++;
                    }
                    $this->listner->branch->individual_counter += 1;
                    $this->listner->branch->save();
                }
                //Формирование прихода
                $inflow = new Inflow();
                $inflow->subject_id = $this->subject_id;
                $inflow->receiver = $this->teacher->user->last_name." ".$this->teacher->user->first_name;
                $inflow->form_id = $this->form_id;
                $inflow->based = $this->code;
                $inflow->comment = $this->note;
                $inflow->date = $this->start_date;
                $inflow->branch_id = $this->listner->branch_id;
                $inflow->save();
                //Изменение статуса
                if($this->listner->status != 1){
                    $this->listner->status = 1;
                    $this->listner->save();
                }
            }
            parent::afterSave();
            
        }
        
        protected function findRoom($t)
        {
            return Room::model()->findBySql("SELECT t1.id FROM spbp_branch_room t1 JOIN spbp_listner_schedule t2 ON t2.room_id = t1.id WHERE t2.start_time <> '$t'")->id;             
        }
        
        public function getNext(){
            return $this->model()->findBySql('SELECT * FROM spbp_listner_position t1 WHERE t1.parent_id ='.$this->id);
        }
        public function getPrev(){
            if($this->parent_id)
                return $this->model()->findBySql('SELECT * FROM spbp_listner_position t1 WHERE t1.id ='.$this->parent_id);
            else
                return false;
        }

        /**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Номер учета',
                        'type' =>  'Форма обучения',
			'form_id' => 'Тариф',
			'listner_id' => 'Слушатель',
			'teacher_id' => 'Преподаватель',
                        'start_period' => 'Начало расчетного периода',
                        'end_period' => 'Конец расчетного периода',
			'subject_id' => 'Предмет',
			'group_id' => 'Группа',
			'lvl' => 'Уровень',
			'note' => 'Примечание',
			'time' => 'Время',
			'start_date' => 'Дата начала обучения',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('form_id',$this->form_id);
		$criteria->compare('listner_id',$this->listner_id);
		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('lvl',$this->lvl,true);
                $criteria->compare('is_test', $this->is_test);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('start_date',$this->start_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Position the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function days($time)
        {
            return self::$_days[date('w',  strtotime(substr($time, 0, 10)))].'('. substr($time, 11).'-' .date('H:i',strtotime(substr($time, 11)) + 60*60) . '); ';
        }
        public function getMonth()
        {
            return self::$_month[date('n', strtotime($this->start_date))-1];
        }
}
