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
    Yii::t('ListnerModule.listner', 'Типы форм обучения') => ['/listner/type/index'],
    Yii::t('ListnerModule.listner', 'Добавление'),
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Типы форм обучения - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Типами форм обучения'), 'url' => ['/listner/type/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Тип формы обучения'), 'url' => ['/listner/type/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Типы форм обучения'); ?>
        <small><?php echo Yii::t('ListnerModule.listner', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>