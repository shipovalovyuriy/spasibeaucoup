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
    Yii::t('BranchModule.branch', 'Комнаты') => ['/branch/roomBackend/index'],
    Yii::t('BranchModule.branch', 'Добавление'),
];

$this->pageTitle = Yii::t('BranchModule.branch', 'Комнаты - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BranchModule.branch', 'Управление Комнатам'), 'url' => ['/branch/roomBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BranchModule.branch', 'Добавить Комнату'), 'url' => ['/branch/roomBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BranchModule.branch', 'Комнаты'); ?>
        <small><?php echo Yii::t('BranchModule.branch', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>