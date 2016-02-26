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
 *   @var $this TeacherBackendController
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
            <?php echo $form->dropDownListGroup($model, 'user_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(User::model()->findAll(), 'id', 'first_name')
                    ]
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