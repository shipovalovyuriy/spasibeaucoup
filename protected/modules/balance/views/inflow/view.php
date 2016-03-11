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
    Yii::t('BalanceModule.balance', 'Приход') => ['/balance/Inflow/index'],
    $model->id,
];

$this->pageTitle = Yii::t('BalanceModule.balance', 'Приход - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BalanceModule.balance', 'Управление Приходам'), 'url' => ['/balance/Inflow/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BalanceModule.balance', 'Добавить Приход'), 'url' => ['/balance/Inflow/create']],
    ['label' => Yii::t('BalanceModule.balance', 'Приход') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('BalanceModule.balance', 'Редактирование Прихода'), 'url' => [
        '/balance/Inflow/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('BalanceModule.balance', 'Просмотреть Приход'), 'url' => [
        '/balance/Inflow/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('BalanceModule.balance', 'Удалить Приход'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/balance/Inflow/delete', 'id' => $model->id],
        'confirm' => Yii::t('BalanceModule.balance', 'Вы уверены, что хотите удалить Приход?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BalanceModule.balance', 'Просмотр') . ' ' . Yii::t('BalanceModule.balance', 'Прихода'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'subj_id',
        'receiver',
        'price',
        'based',
        'comment',
        'date',
    ],
]); ?>
