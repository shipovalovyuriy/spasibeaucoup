<?php
/**
 * Отображение для _search:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'action'      => Yii::app()->createUrl($this->route),
        'method'      => 'get',
        'type'        => 'vertical',
        'htmlOptions' => ['class' => 'well'],
    ]
);
?>

<fieldset>
    <div class="row">
        <div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('id'),
                        'data-content' => $model->getAttributeDescription('id')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
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
		<div class="col-sm-3">
            <?php echo $form->dropDownListGroup($model, 'form_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Form::model()->findAll(), 'id', 'name')
                    ]
                ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->dropDownListGroup($model, 'listner_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Listner::model()->findAll(), 'id', 'name')
                    ]
                ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->dropDownListGroup($model, 'teacher_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Teacher::model()->findAll(), 'id', 'id')
                    ]
                ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->dropDownListGroup($model, 'subject_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Subject::model()->findAll(), 'id', 'name')
                    ]
                ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->dropDownListGroup($model, 'group_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Group::model()->findAll(), 'id', 'name')
                    ]
                ]); ?>
        </div>
		<div class="col-sm-3">
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
		<div class="col-sm-3">
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
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'time', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('time'),
                        'data-content' => $model->getAttributeDescription('time')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->datePickerGroup($model,'start_date', [
            'widgetOptions'=>[
                'options' => [],
                'htmlOptions' => []
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
		    </div>
</fieldset>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'context'     => 'primary',
            'encodeLabel' => false,
            'buttonType'  => 'submit',
            'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('ListnerModule.listner', 'Искать Положение'),
        ]
    ); ?>

<?php $this->endWidget(); ?>