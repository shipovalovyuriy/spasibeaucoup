<?php
/**
 * Отображение для create:
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
    Yii::t('TeacherModule.teacher', 'Добавление'),
];

$this->pageTitle = Yii::t('TeacherModule.teacher', 'Учителя - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('TeacherModule.teacher', 'Управление Учителями'), 'url' => ['/teacher/teacherBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('TeacherModule.teacher', 'Добавить Учителя'), 'url' => ['/teacher/teacherBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('TeacherModule.teacher', 'Учителя'); ?>
        <small><?php echo Yii::t('TeacherModule.teacher', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>