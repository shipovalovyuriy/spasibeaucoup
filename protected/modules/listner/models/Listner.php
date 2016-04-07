<?php

/**
 * This is the model class for table "{{listner_listner}}".
 *
 * The followings are the available columns in table '{{listner_listner}}':
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $patronymic
 * @property string $phone
 * @property string $create_date
 * @property integer $branch_id
 * @property string $email
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property BranchBranch $branch
 * @property ListnerPosition[] $listnerPositions
 */
class Listner extends yupe\models\YModel
{
    const STATUS_POTENTIAL = 0;
    const STATUS_LISTNER = 1;
    const STATUS_GRADUATE = 2;
    const STATUS_CANCEL = 3;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return '{{listner_listner}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('name, lastname, patronymic, phone, create_date', 'required'),
                    array('branch_id, status', 'numerical', 'integerOnly'=>true),
                    array('name, lastname, patronymic, phone, email', 'length', 'max'=>50),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, name, lastname, patronymic, phone, create_date, branch_id, email, status', 'safe', 'on'=>'search'),
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
                    'position' => array(self::HAS_MANY, 'Position', 'listner_id'),
            );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                    'id' => '№',
                    'name' => 'Имя',
                    'lastname' => 'Фамилия',
                    'patronymic' => 'Отчество',
                    'phone' => 'Телефон',
                    'create_date' => 'Дата регистрации',
                    'branch_id' => 'Филиал',
                    'email' => 'Email',
                    'status' => 'Статус',
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
            $criteria->compare('lastname',$this->lastname,true);
            $criteria->compare('patronymic',$this->patronymic,true);
            $criteria->compare('phone',$this->phone,true);
            $criteria->compare('create_date',$this->create_date,true);
            $criteria->compare('branch_id',$this->branch_id);
            $criteria->compare('email',$this->email,true);
            $criteria->compare('status',$this->status);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }
    
    public function getStatusList()
    {
        return [
            self::STATUS_POTENTIAL  => 'Потенциальный',
            self::STATUS_LISTNER    => 'Студент',
            self::STATUS_GRADUATE   => 'Выпускник',
            self::STATUS_CANCEL     => 'Отказ',
        ];
    }
    public function getStatus($s)
    {
        $status = [
            self::STATUS_POTENTIAL  => 'Потенциальный',
            self::STATUS_LISTNER    => 'Студент',
            self::STATUS_GRADUATE   => 'Выпускник',
            self::STATUS_CANCEL     => 'Отказ',
        ];
        return $status[$s];
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Listner the static model class
     */
    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
}
