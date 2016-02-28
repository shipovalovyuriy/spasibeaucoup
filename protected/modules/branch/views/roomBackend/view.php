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
    Yii::t('BranchModule.branch', 'Комнаты') => ['/branch/roomBackend/index'],
    $model->id,
];

$this->pageTitle = Yii::t('BranchModule.branch', 'Комнаты - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BranchModule.branch', 'Управление Комнатам'), 'url' => ['/branch/roomBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BranchModule.branch', 'Добавить Комнату'), 'url' => ['/branch/roomBackend/create']],
    ['label' => Yii::t('BranchModule.branch', 'Комната') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('BranchModule.branch', 'Редактирование Комнаты'), 'url' => [
        '/branch/roomBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('BranchModule.branch', 'Просмотреть Комнату'), 'url' => [
        '/branch/roomBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('BranchModule.branch', 'Удалить Комнату'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/branch/roomBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('BranchModule.branch', 'Вы уверены, что хотите удалить Комнату?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BranchModule.branch', 'Просмотр') . ' ' . Yii::t('BranchModule.branch', 'Комнаты'); ?>        <br/>
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
