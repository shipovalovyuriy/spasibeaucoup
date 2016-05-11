<?php
/**
 * Отображение для _form:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 *
 *   @var $model Teacher
 *   @var $form TbActiveForm
 *   @var $this TeacherController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'teacher-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>

<div class="alert alert-info">
    <?php echo Yii::t('TeacherModule.teacher', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('TeacherModule.teacher', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-7">
            <?php
                if($model->isNewRecord){
                    echo $form->dropDownListGroup($model, 'user_id', [
                        'widgetOptions' => [
                            'data' => CHtml::listData(User::model()->findAll('is_test=0'), 'id', 'fullName'),
                            'htmlOptions' => [
                                'empty' => '--выберите--',
                                'encode' => false,
                            ],
                        ],

                    ]);
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'start_time', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('start_time'),
                        'data-content' => $model->getAttributeDescription('start_time')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'end_time', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('end_time'),
                        'data-content' => $model->getAttributeDescription('end_time')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'branch_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Branch::model()->findAll(), 'id', 'name'),
                        'htmlOptions' => [
                            'empty' => '--выберите--',
                            'encode' => false,
                        ],
                    ],
                    
                ]); ?>
        </div>
    </div>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('TeacherModule.teacher', 'Сохранить Учителя и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('TeacherModule.teacher', 'Сохранить Учителя и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>