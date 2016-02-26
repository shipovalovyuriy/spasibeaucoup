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
    Yii::t('SubjectModule.subject', 'Предметы') => ['/subject/subjectBackend/index'],
    Yii::t('SubjectModule.subject', 'Добавление'),
];

$this->pageTitle = Yii::t('SubjectModule.subject', 'Предметы - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('SubjectModule.subject', 'Управление Предметами'), 'url' => ['/subject/subjectBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('SubjectModule.subject', 'Добавить Предмет'), 'url' => ['/subject/subjectBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('SubjectModule.subject', 'Предметы'); ?>
        <small><?php echo Yii::t('SubjectModule.subject', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>