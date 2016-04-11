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
$add = '';
if(!array_intersect(['2','3'], Yii::app()->user->role))
{
    $add = CHtml::link(
                Yii::t('YupeModule.yupe', 'Add'),
                ['/teacher/create'],
                ['class' => 'btn btn-success pull-right btn-sm']
            );
}
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('TeacherModule.teacher', 'Учителя') => ['/teacher/teacher/index'],
    Yii::t('TeacherModule.teacher', 'Управление'),
];

$this->pageTitle = Yii::t('TeacherModule.teacher', 'Учителя - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('TeacherModule.teacher', 'Управление Учителями'), 'url' => ['/teacher/teacher/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('TeacherModule.teacher', 'Добавить Учителя'), 'url' => ['/teacher/teacher/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('TeacherModule.teacher', 'Учителя'); ?>
        <small><?php echo Yii::t('TeacherModule.teacher', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('TeacherModule.teacher', 'Поиск Учителей');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('teacher-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('TeacherModule.teacher', 'В данном разделе представлены средства управления Учителями'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'teacher-grid',
        'type'         => 'striped condensed',
        'actionsButtons' => [
            $add
        ],
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            [
                'header' => 'Имя преподавателя',
                'name'   => 'user.first_name',
            ],
            [
                'header' => 'Филиал',
                'name'   => 'branch.name',
            ],
            [
                'class' => 'yupe\widgets\FrontButtonColumn',
            ],
        ],
    ]
); ?>
