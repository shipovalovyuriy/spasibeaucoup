<?php
/**
 * Отображение для index:
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
    Yii::t('BalanceModule.balance', 'Управление'),
];

$this->pageTitle = Yii::t('BalanceModule.balance', 'Шифры - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BalanceModule.balance', 'Управление Шифрами'), 'url' => ['/balance/costBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BalanceModule.balance', 'Добавить Шифр'), 'url' => ['/balance/costBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BalanceModule.balance', 'Шифры'); ?>
        <small><?php echo Yii::t('BalanceModule.balance', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('BalanceModule.balance', 'Поиск Шифров');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('cost-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('BalanceModule.balance', 'В данном разделе представлены средства управления Шифрами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'cost-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'name',
            'code',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
