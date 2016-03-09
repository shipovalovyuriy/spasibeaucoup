<?php
/**
 * Отображение для view:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('TeacherModule.teacher', 'Учителя') => ['/teacher/teacher/index'],
    $model->id,
];

$this->pageTitle = Yii::t('TeacherModule.teacher', 'Учителя - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('TeacherModule.teacher', 'Управление Учителями'), 'url' => ['/teacher/teacher/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('TeacherModule.teacher', 'Добавить Учителя'), 'url' => ['/teacher/teacher/create']],
    ['label' => Yii::t('TeacherModule.teacher', 'Учитель') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('TeacherModule.teacher', 'Редактирование Учителя'), 'url' => [
        '/teacher/teacher/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('TeacherModule.teacher', 'Просмотреть Учителя'), 'url' => [
        '/teacher/teacher/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('TeacherModule.teacher', 'Удалить Учителя'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/teacher/teacher/delete', 'id' => $model->id],
        'confirm' => Yii::t('TeacherModule.teacher', 'Вы уверены, что хотите удалить Учителя?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('TeacherModule.teacher', 'Просмотр') . ' ' . Yii::t('TeacherModule.teacher', 'Учителя'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'user_id',
        'time',
        'branch_id',
    ],
]); ?>
