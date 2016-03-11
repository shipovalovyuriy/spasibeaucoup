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
    Yii::t('BalanceModule.balance', 'Шифры') => ['/balance/costBackend/index'],
    $model->name,
];

$this->pageTitle = Yii::t('BalanceModule.balance', 'Шифры - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BalanceModule.balance', 'Управление Шифрами'), 'url' => ['/balance/costBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BalanceModule.balance', 'Добавить Шифр'), 'url' => ['/balance/costBackend/create']],
    ['label' => Yii::t('BalanceModule.balance', 'Шифр') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('BalanceModule.balance', 'Редактирование Шифра'), 'url' => [
        '/balance/costBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('BalanceModule.balance', 'Просмотреть Шифр'), 'url' => [
        '/balance/costBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('BalanceModule.balance', 'Удалить Шифр'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/balance/costBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('BalanceModule.balance', 'Вы уверены, что хотите удалить Шифр?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BalanceModule.balance', 'Просмотр') . ' ' . Yii::t('BalanceModule.balance', 'Шифра'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'name',
        'code',
    ],
]); ?>
