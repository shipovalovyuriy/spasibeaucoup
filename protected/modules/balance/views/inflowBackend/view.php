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
    Yii::t('BalanceModule.balance', 'Доходы') => ['/balance/inflowBackend/index'],
    $model->id,
];

$this->pageTitle = Yii::t('BalanceModule.balance', 'Доходы - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BalanceModule.balance', 'Управление Доходами'), 'url' => ['/balance/inflowBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BalanceModule.balance', 'Добавить Доход'), 'url' => ['/balance/inflowBackend/create']],
    ['label' => Yii::t('BalanceModule.balance', 'Доход') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('BalanceModule.balance', 'Редактирование Дохода'), 'url' => [
        '/balance/inflowBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('BalanceModule.balance', 'Просмотреть Доход'), 'url' => [
        '/balance/inflowBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('BalanceModule.balance', 'Удалить Доход'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/balance/inflowBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('BalanceModule.balance', 'Вы уверены, что хотите удалить Доход?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BalanceModule.balance', 'Просмотр') . ' ' . Yii::t('BalanceModule.balance', 'Дохода'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'subject_id',
        'receiver',
        'price',
        'based',
        'comment',
        'date',
    ],
]); ?>
