<?php
/**
 * Отображение для update:
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
    $model->id => ['/teacher/teacherBackend/view', 'id' => $model->id],
    Yii::t('TeacherModule.teacher', 'Редактирование'),
];

$this->pageTitle = Yii::t('TeacherModule.teacher', 'Учителя - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('TeacherModule.teacher', 'Управление Учителями'), 'url' => ['/teacher/teacherBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('TeacherModule.teacher', 'Добавить Учителя'), 'url' => ['/teacher/teacherBackend/create']],
    ['label' => Yii::t('TeacherModule.teacher', 'Учитель') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('TeacherModule.teacher', 'Редактирование Учителя'), 'url' => [
        '/teacher/teacherBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('TeacherModule.teacher', 'Просмотреть Учителя'), 'url' => [
        '/teacher/teacherBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('TeacherModule.teacher', 'Удалить Учителя'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/teacher/teacherBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('TeacherModule.teacher', 'Вы уверены, что хотите удалить Учителя?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('TeacherModule.teacher', 'Редактирование') . ' ' . Yii::t('TeacherModule.teacher', 'Учителя'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>