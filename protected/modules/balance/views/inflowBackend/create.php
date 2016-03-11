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
    Yii::t('BalanceModule.balance', 'Доходы') => ['/balance/inflowBackend/index'],
    Yii::t('BalanceModule.balance', 'Добавление'),
];

$this->pageTitle = Yii::t('BalanceModule.balance', 'Доходы - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BalanceModule.balance', 'Управление Доходами'), 'url' => ['/balance/inflowBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BalanceModule.balance', 'Добавить Доход'), 'url' => ['/balance/inflowBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BalanceModule.balance', 'Доходы'); ?>
        <small><?php echo Yii::t('BalanceModule.balance', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>