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
    Yii::t('ListnerModule.listner', 'Расписания') => ['/listner/scheduleBackend/index'],
    $model->id => ['/listner/scheduleBackend/view', 'id' => $model->id],
    Yii::t('ListnerModule.listner', 'Редактирование'),
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Расписания - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Расписаниями'), 'url' => ['/listner/scheduleBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Расписание'), 'url' => ['/listner/scheduleBackend/create']],
    ['label' => Yii::t('ListnerModule.listner', 'Расписание') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('ListnerModule.listner', 'Редактирование Расписания'), 'url' => [
        '/listner/scheduleBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('ListnerModule.listner', 'Просмотреть Расписание'), 'url' => [
        '/listner/scheduleBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('ListnerModule.listner', 'Удалить Расписание'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/listner/scheduleBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('ListnerModule.listner', 'Вы уверены, что хотите удалить Расписание?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Редактирование') . ' ' . Yii::t('ListnerModule.listner', 'Расписания'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>