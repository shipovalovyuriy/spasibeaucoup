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
        <small>управление</small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('UserModule.user', 'Find users'); ?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
    <?php
    Yii::app()->clientScript->registerScript(
        'search',
        "
    $('.search-form form').submit(function () {
        event.preventDefault();

        $.fn.yiiGridView.update('user-grid', {
            data: $(this).serialize()
        });
    });

    $(document).on('click', '.verify-email', function () {
        var link = $(this);

        event.preventDefault();

        $.post(link.attr('href'), actionToken.token)
            .done(function (response) {
                bootbox.alert(response.data);
            });
    });
"
    );
    $this->renderPartial('_search', ['model' => $model]);
    ?>
</div>

<?php $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'user-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'nick_name',
            'first_name',
            'last_name',
            [
                'name'  => 'email',
                'type'  => 'raw',
                'value' => 'CHtml::link($data->email, "mailto:" . $data->email)',
            ],
            [
                'name'   => 'visit_time',
                'filter' => false
            ],
            [
                'name'   => 'salary',
                'filter' => false,
                'value'  => '$data->salary . " ₸"'
            ],
            [
            	'name'  => 'access_level',
            	'filter' => false,
            	'value' 	=> '$data->post->role->name'
            ],
            [
                'header'      => Yii::t('UserModule.user', 'Management'),
                'class'       => 'yupe\widgets\FrontButtonColumn',
                'template'    => '{view}{update}{password}{delete}',
                'buttons'     => [
                    'password'       => [
                        'icon'  => 'fa fa-fw fa-lock',
                        'label' => Yii::t('UserModule.user', 'Change password'),
                        'url'   => 'array("/user/user/changepassword", "id" => $data->id)',
                    ],
                ],
            ],
        ],
    ]
); ?>