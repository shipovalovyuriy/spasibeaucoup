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
 *   @var $model Form
 *   @var $form TbActiveForm
 *   @var $this FormBackendController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'form-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
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
            <?php echo $form->dropDownListGroup($model, 'type_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Type::model()->findAll(), 'id', 'name')
                    ]
                ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('name'),
                        'data-content' => $model->getAttributeDescription('name')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'description', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('description'),
                        'data-content' => $model->getAttributeDescription('description')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'number', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('number'),
                        'data-content' => $model->getAttributeDescription('number')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'number_in_week', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('number_in_week'),
                        'data-content' => $model->getAttributeDescription('number_in_week')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'price', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('price'),
                        'data-content' => $model->getAttributeDescription('price')
                    ]
                ]
            ]); ?>
        </div>
    </div>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Тариф и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Тариф и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>