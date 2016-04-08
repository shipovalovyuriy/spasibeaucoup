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
    Yii::t('BranchModule.branch', 'Аудитории') => ['/branch/room/index'],
    Yii::t('BranchModule.branch', 'Управление'),
];

$this->pageTitle = Yii::t('BranchModule.branch', 'Аудитории - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BranchModule.branch', 'Управление Аудиториями'), 'url' => ['/branch/room/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BranchModule.branch', 'Добавить Аудиторию'), 'url' => ['/branch/room/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BranchModule.branch', 'Аудитории'); ?>
        <small><?php echo Yii::t('BranchModule.branch', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('BranchModule.branch', 'Поиск Аудиторий');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('room-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('BranchModule.branch', 'В данном разделе представлены средства управления Аудиториями'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'room-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            [
                'header' => 'Филиал',
                'name'   => 'branch.name',
            ],
            'alias',
            'capacity',
            [
                'class' => 'yupe\widgets\FrontButtonColumn',
            ],
        ],
    ]
); ?>
