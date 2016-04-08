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
    Yii::t('ListnerModule.listner', 'Формы обучения') => ['/listner/form/index'],
    Yii::t('ListnerModule.listner', 'Добавление'),
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Формы обучения - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Формами обучения'), 'url' => ['/listner/form/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Форму обучения'), 'url' => ['/listner/form/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Формы обучения'); ?>
        <small><?php echo Yii::t('ListnerModule.listner', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>