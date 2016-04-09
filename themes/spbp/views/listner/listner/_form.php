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
 *   @var $model Listner
 *   @var $form TbActiveForm
 *   @var $this ListnerController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'listner-form',
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
            <?php echo $form->textFieldGroup($model, 'lastname', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('lastname'),
                        'data-content' => $model->getAttributeDescription('lastname')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'patronymic', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('patronymic'),
                        'data-content' => $model->getAttributeDescription('patronymic')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->labelEx($model,'phone',['class' => 'control-label']); ?>
            <?php $this->widget(
                'CMaskedTextField',
                [
                    'model' => $model,
                    'attribute' => 'phone',
                    'mask' => '+9(999)999-99-99',
                    'placeholder' => '*',
                    'htmlOptions' => [
                        'class' => 'form-control'
                    ]
                ]
            ); ?>
            <?php echo $form->error($model,'phone'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->emailFieldGroup($model, 'email', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('email'),
                        'data-content' => $model->getAttributeDescription('email')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <?php $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)):?>
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
    <?php endif;?>
    <?php if(!$model->isNewRecord): ?>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group">
                    <label class="control-label required" for="Listner_status">Статус</label>
                    <select class="form-control" placeholder="Форма обучения" name="Listner[status]" id="Listner_status">
                        <option value="">--выберите--</option>
                        <option value="3">Отказ</option>
                    </select>
                </div>
            </div>
        </div>
    <?php endif;?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Студента и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Студента и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>