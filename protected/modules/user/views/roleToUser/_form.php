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
 *   @var $model RoleToUser
 *   @var $form TbActiveForm
 *   @var $this RoleToUserController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'role-to-user-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>

<div class="alert alert-info">
    <?php echo Yii::t('UserModule.user', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('UserModule.user', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'user_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(User::model()->findAll(), 'id', 'first_name')
                    ]
                ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'role_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Role::model()->findAll(), 'id', 'name')
                    ]
                ]); ?>
        </div>
    </div>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('UserModule.user', 'Сохранить Должность и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('UserModule.user', 'Сохранить Должность и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>