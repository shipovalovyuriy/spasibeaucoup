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
    Yii::t('TeacherModule.teacher', 'Учителя') => ['/teacher/teacherBackend/index'],
    Yii::t('TeacherModule.teacher', 'Управление'),
];

$this->pageTitle = Yii::t('TeacherModule.teacher', 'Учителя - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('TeacherModule.teacher', 'Управление Учителями'), 'url' => ['/teacher/teacherBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('TeacherModule.teacher', 'Добавить Учителя'), 'url' => ['/teacher/teacherBackend/create']],
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
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'teacher-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'user_id',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
