<?php
/**
 * Отображение для _form:
 *
 * @category YupeView
 * @package  yupe
 * @author   Yupe Team <team@yupe.ru>
 * @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 * @link     http://yupe.ru
 *
 * @var $model Position
 * @var $form TbActiveForm
 * @var $this PositionBackendController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id' => 'position-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'htmlOptions' => ['class' => 'well'],
    ]
);
?>

<div class="alert alert-info">
    <?php echo Yii::t('ListnerModule.listner', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('ListnerModule.listner', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-7">
        <?php echo $form->textFieldGroup($model, 'code', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('code'),
                    'data-content' => $model->getAttributeDescription('code')
                ]
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->dropDownListGroup($model, 'form_id', [
            'widgetOptions' => [
                'data' => CHtml::listData(Form::model()->findAll(), 'id', 'name')
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->dropDownListGroup($model, 'listner_id', [
            'widgetOptions' => [
                'data' => CHtml::listData(Listner::model()->findAll(), 'id', 'name')
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->dropDownListGroup($model, 'teacher_id', [
            'widgetOptions' => [
                'data' => CHtml::listData(Teacher::model()->findAll(), 'id', 'id')
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->dropDownListGroup($model, 'subject_id', [
            'widgetOptions' => [
                'data' => CHtml::listData(Subject::model()->findAll(), 'id', 'name')
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->dropDownListGroup($model, 'group_id', [
            'widgetOptions' => [
                'data' => CHtml::listData(Group::model()->findAll(), 'id', 'name')
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->textFieldGroup($model, 'lvl', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('lvl'),
                    'data-content' => $model->getAttributeDescription('lvl')
                ]
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->textFieldGroup($model, 'note', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('note'),
                    'data-content' => $model->getAttributeDescription('note')
                ]
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php 
        echo $form->timePickerGroup($model, 'time', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('time'),
                        'data-content' => $model->getAttributeDescription('time')
                    ],
                    'options' => [
                        'showMeridian' => false // irrelevant
                    ],
                ]
            ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php 
        echo $form->datePickerGroup($model, 'start_date', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('time'),
                        'data-content' => $model->getAttributeDescription('time')
                    ],
                ]
            ]); ?>
    </div>
</div>


<?php $this->widget(
    'bootstrap.widgets.TbButton', [
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => Yii::t('ListnerModule.listner', 'Сохранить Положение и продолжить'),
    ]
); ?>
<?php $this->widget(
    'bootstrap.widgets.TbButton', [
        'buttonType' => 'submit',
        'htmlOptions' => ['name' => 'submit-type', 'value' => 'index'],
        'label' => Yii::t('ListnerModule.listner', 'Сохранить Положение и закрыть'),
    ]
); ?>

<?php $this->endWidget(); ?>

