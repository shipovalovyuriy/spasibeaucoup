<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('UserModule.user', 'Должности') => ['/user/roleToUser/index'],
    Yii::t('UserModule.user', 'Управление'),
];

$this->pageTitle = Yii::t('UserModule.user', 'Должности - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('UserModule.user', 'Управление Должностями'), 'url' => ['/user/roleToUser/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('UserModule.user', 'Добавить Должность'), 'url' => ['/user/roleToUser/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('UserModule.user', 'Должности'); ?>
        <small><?php echo Yii::t('UserModule.user', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('UserModule.user', 'Поиск Должностей');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('role-to-user-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('UserModule.user', 'В данном разделе представлены средства управления Должностями'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'role-to-user-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'user_id',
            'role_id',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
