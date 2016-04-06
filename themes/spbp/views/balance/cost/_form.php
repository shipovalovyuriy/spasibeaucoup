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
 *   @var $model Cost
 *   @var $form TbActiveForm
 *   @var $this CostBackendController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'cost-form',
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

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('BalanceModule.balance', 'Сохранить Шифр и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('BalanceModule.balance', 'Сохранить Шифр и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>