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
            <?php echo $form->dateTimePickerGroup($model,'update_time', [
            'widgetOptions' => [
                'options' => [],
                'htmlOptions'=>[]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'first_name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('first_name'),
                        'data-content' => $model->getAttributeDescription('first_name')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'middle_name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('middle_name'),
                        'data-content' => $model->getAttributeDescription('middle_name')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'last_name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('last_name'),
                        'data-content' => $model->getAttributeDescription('last_name')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'nick_name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('nick_name'),
                        'data-content' => $model->getAttributeDescription('nick_name')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'email', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('email'),
                        'data-content' => $model->getAttributeDescription('email')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'gender', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('gender'),
                        'data-content' => $model->getAttributeDescription('gender')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->datePickerGroup($model,'birth_date', [
            'widgetOptions'=>[
                'options' => [],
                'htmlOptions' => []
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'site', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('site'),
                        'data-content' => $model->getAttributeDescription('site')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'about', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('about'),
                        'data-content' => $model->getAttributeDescription('about')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'location', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('location'),
                        'data-content' => $model->getAttributeDescription('location')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'status', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('status'),
                        'data-content' => $model->getAttributeDescription('status')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'access_level', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('access_level'),
                        'data-content' => $model->getAttributeDescription('access_level')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->dateTimePickerGroup($model,'visit_time', [
            'widgetOptions' => [
                'options' => [],
                'htmlOptions'=>[]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->dateTimePickerGroup($model,'create_time', [
            'widgetOptions' => [
                'options' => [],
                'htmlOptions'=>[]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'avatar', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('avatar'),
                        'data-content' => $model->getAttributeDescription('avatar')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'hash', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('hash'),
                        'data-content' => $model->getAttributeDescription('hash')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'email_confirm', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('email_confirm'),
                        'data-content' => $model->getAttributeDescription('email_confirm')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'phone', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('phone'),
                        'data-content' => $model->getAttributeDescription('phone')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'salary', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('salary'),
                        'data-content' => $model->getAttributeDescription('salary')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->datePickerGroup($model,'salary_date', [
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
            'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('BranchModule.branch', 'Искать Сотрудника'),
        ]
    ); ?>

<?php $this->endWidget(); ?>