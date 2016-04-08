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
    Yii::t('BranchModule.branch', 'Аудитории') => ['/branch/room/index'],
    $model->id,
];

$this->pageTitle = Yii::t('BranchModule.branch', 'Аудитории - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BranchModule.branch', 'Управление Аудиториями'), 'url' => ['/branch/room/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BranchModule.branch', 'Добавить Аудиторию'), 'url' => ['/branch/room/create']],
    ['label' => Yii::t('BranchModule.branch', 'Аудитория') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('BranchModule.branch', 'Редактирование Аудитории'), 'url' => [
        '/branch/room/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('BranchModule.branch', 'Просмотреть Аудиторию'), 'url' => [
        '/branch/room/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('BranchModule.branch', 'Удалить Аудиторию'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/branch/room/delete', 'id' => $model->id],
        'confirm' => Yii::t('BranchModule.branch', 'Вы уверены, что хотите удалить Аудиторию?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BranchModule.branch', 'Просмотр') . ' ' . Yii::t('BranchModule.branch', 'Аудитории'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'branch_id',
        'alias',
        'capacity',
    ],
]); ?>
