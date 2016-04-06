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
 *   @var $model Inflow
 *   @var $form TbActiveForm
 *   @var $this InflowController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'inflow-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>

<div class="alert alert-info">
    <?php echo Yii::t('BalanceModule.balance', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('BalanceModule.balance', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

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
            <?php echo $form->textFieldGroup($model, 'receiver', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('receiver'),
                        'data-content' => $model->getAttributeDescription('receiver')
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
            <?php echo $form->textFieldGroup($model, 'based', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('based'),
                        'data-content' => $model->getAttributeDescription('based')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textAreaGroup($model, 'comment', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('comment'),
                    'data-content' => $model->getAttributeDescription('comment')
                ]
            ]]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'date', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('date'),
                        'data-content' => $model->getAttributeDescription('date')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'branch_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('branch_id'),
                        'data-content' => $model->getAttributeDescription('branch_id')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('BalanceModule.balance', 'Сохранить Приход и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('BalanceModule.balance', 'Сохранить Приход и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>