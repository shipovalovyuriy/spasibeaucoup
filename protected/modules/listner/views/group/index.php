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
    Yii::t('ListnerModule.listner', 'Группы') => ['/listner/group/index'],
    Yii::t('ListnerModule.listner', 'Управление'),
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Группы - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Группам'), 'url' => ['/listner/group/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Группу'), 'url' => ['/listner/group/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Группы'); ?>
        <small><?php echo Yii::t('ListnerModule.listner', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('ListnerModule.listner', 'Поиск Групп');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('group-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('ListnerModule.listner', 'В данном разделе представлены средства управления Группам'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'group-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'name',
            'time',
            'lvl',
            'note',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
