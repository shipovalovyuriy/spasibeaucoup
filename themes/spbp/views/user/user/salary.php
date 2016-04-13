<?php

/**
 * @var $model User
 * @var $this UserBackendController
 */

$this->breadcrumbs = [
    Yii::t('UserModule.user', 'Users') => ['/user/userBackend/index'],
    Yii::t('UserModule.user', 'Management'),
];

$this->pageTitle = Yii::t('UserModule.user', 'Users - management');

$this->menu = [
    [
        'label' => Yii::t('UserModule.user', 'Users'),
        'items' => [
            [
                'icon'  => 'fa fa-fw fa-list-alt',
                'label' => Yii::t('UserModule.user', 'Manage users'),
                'url'   => ['/user/userBackend/index']
            ],
            [
                'icon'  => 'fa fa-fw fa-plus-square',
                'label' => Yii::t('UserModule.user', 'Create user'),
                'url'   => ['/user/userBackend/create']
            ],
        ]
    ],
    [
        'label' => Yii::t('UserModule.user', 'Tokens'),
        'items' => [
            [
                'icon'  => 'fa fa-fw fa-list-alt',
                'label' => Yii::t('UserModule.user', 'Token list'),
                'url'   => ['/user/tokensBackend/index']
            ],
        ]
    ],
];
?>

<div class="page-header">
    <h1>
        Сотрудники
        <small>з/п</small>
    </h1>
</div>


<?php $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'user-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [            
            [
                'name'  => 'email',
                'type'  => 'raw',
                'value' => 'CHtml::link($data->email, "mailto:" . $data->email)',
            ],
            [
                'class'    => 'bootstrap.widgets.TbEditableColumn',
                'editable' => [
                    'url'    => $this->createUrl('/user/user/inline'),
                    'mode'   => 'popup',
                    'type'   => 'select',
                    'title'  => Yii::t(
                        'UserModule.user',
                        'Select {field}',
                        ['{field}' => mb_strtolower($model->getAttributeLabel('access_level'))]
                    ),
                    'source' => $model->getAccessLevelsList(),
                    'params' => [
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                    ]
                ],
                'name'     => 'access_level',
                'type'     => 'raw',
                'value'    => '$data->getAccessLevel()',
                'filter'   => CHtml::activeDropDownList(
                    $model,
                    'access_level',
                    $model->getAccessLevelsList(),
                    ['class' => 'form-control', 'empty' => '']
                ),
            ],
            [
                'class'   => 'yupe\widgets\EditableStatusColumn',
                'name'    => 'status',
                'url'     => $this->createUrl('/user/user/inline'),
                'source'  => $model->getStatusList(),
                'options' => [
                    User::STATUS_ACTIVE     => ['class' => 'label-success'],
                    User::STATUS_BLOCK      => ['class' => 'label-danger'],
                    User::STATUS_NOT_ACTIVE => ['class' => 'label-warning'],
                ],
            ],
            [
                'name'   => 'visit_time',
                'filter' => false
            ],
            [
                'name'   => 'salary_date',
                'filter' => false,
                'value'  => '$data->salary_date." ".$data->month',
            ],
            [
                'name'   => 'salary',
                'filter' => false,
                'value'  => '$data->salary . " ₸"'
            ],
            [
                'header'      => Yii::t('UserModule.user', 'Management'),
                'class'       => 'yupe\widgets\FrontButtonColumn',
                'template'    => '{view}{update}{password}{sendactivation}',
                'buttons'     => [
                    'password'       => [
                        'icon'  => 'fa fa-fw fa-lock',
                        'label' => Yii::t('UserModule.user', 'Change password'),
                        'url'   => 'array("/user/user/changepassword", "id" => $data->id)',
                    ],
                    'sendactivation' => [
                        'label'   => Yii::t('UserModule.user', 'Send activation confirm'),
                        'url'     => 'array("/user/user/sendactivation", "id" => $data->id)',
                        'icon'    => 'fa fa-fw fa-repeat',
                        'visible' => '$data->status != User::STATUS_ACTIVE',
                        'options' => [
                            'class' => 'user sendactivation'
                        ]
                    ],
                ],
            ],
        ],
    ]
); ?>
